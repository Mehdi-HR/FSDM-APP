import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

class User with ChangeNotifier {
  int code = 0;
  String nom;
  String prenom;
  String type;
  String cin;
  String email;
  String inscriptionDate;
  String hash;
  bool _isAuth = false;
  bool get isAuth {
    return _isAuth && this.code != 0;
    //return this.code != 0;
  }

  bool get isProf {
    return this.type == 'P';
  }

  User({
    this.code,
    this.nom,
    this.prenom,
    this.type,
    this.cin,
    this.inscriptionDate,
    this.email,
    this.hash,
  });

  User _user;

  User get user => User(
        cin: _user.cin,
        code: _user.code,
        email: _user.email,
        nom: _user.nom,
        prenom: _user.prenom,
        type: _user.type,
      );

  Future<void> fetchAndSetUser({code}) async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/getUserByCode.php');
    var response = await http.post(
      url,
      body: {
        'code': code,
      },
    );
    if (response.statusCode != 200) {
      print('connection failed');
      return;
    }
    if (response.body.isEmpty) {
      print('no response');
      return;
    }
    var data = jsonDecode(response.body) as Map<String, dynamic>;
    _user = User(
      code: int.parse(data['code']),
      nom: data['nom'],
      prenom: data['prenom'],
      cin: data['cin'],
      email: data['email'],
      inscriptionDate: data['date_inscription'],
      hash: data['hash'],
      type: data['type'],
    );
    notifyListeners();
  }

  Future<void> authenticate({String email, String password}) async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/auth.php');
    var response = await http.post(
      url,
      body: {
        'email': email,
        'password': password,
      },
    );
    print(response.body);

    if (response.statusCode != 200) {
      print('connection failed');
      _isAuth = false;
      return;
    }
    if (response.body.isEmpty) {
      print('no response');
      _isAuth = false;
      return;
    }
    var userData = jsonDecode(response.body);
    this.code = int.parse(userData['code']);
    this.nom = userData['nom'];
    this.prenom = userData['prenom'];
    this.type = userData['type'];
    this.cin = userData['cin'];
    this.email = userData['email'];
    this.hash = userData['hash'];
    _isAuth = true;
    _user = User(
      code: this.code,
      nom: this.nom,
      prenom: this.prenom,
      type: this.type,
      cin: this.cin,
      email: this.email,
    );

    notifyListeners();

    print('Response : $userData');
    final prefs = await SharedPreferences.getInstance();
    prefs.setString(
      'code',
      userData['code'],
    );
  }

  Future<bool> tryAutoLogin() async {
    final prefs = await SharedPreferences.getInstance();
    if (!prefs.containsKey('code')) {
      _isAuth = false;
      return false;
    }
    final extractedUserData = json.decode(prefs.getString('code')) as int;
    this.code = extractedUserData;
    notifyListeners();
    _isAuth = true;
    return true;
  }

  void logout() async {
    this.code = 0;
    _isAuth = false;
    notifyListeners();
    final prefs = await SharedPreferences.getInstance();
    prefs.clear();
  }
}
