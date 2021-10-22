import 'dart:convert';

import 'package:flutter/Material.dart';
import '../models/professor.dart';
import 'package:http/http.dart' as http;

class ProfessorProvider with ChangeNotifier {
  Professor _professor;

  Professor get professor {
    return Professor(
      code: _professor.code,
      nom: _professor.nom,
      prenom: _professor.prenom,
      email: _professor.email,
      cin: _professor.cin,
      inscriptionDate: _professor.inscriptionDate,
    );
  }

  Future<void> fetchAndSetProfessor({code}) async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/getProfessorByCode.php');
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
    _professor = Professor(
      code: int.parse(data['code_prof']),
      nom: data['nom'],
      prenom: data['prenom'],
      cin: data['cin'],
      email: data['email'],
      inscriptionDate: data['date_inscription'],
    );
    notifyListeners();
  }
}
