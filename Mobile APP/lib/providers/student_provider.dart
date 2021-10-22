import 'dart:convert';

import 'package:flutter/Material.dart';
import '../models/student.dart';
import 'package:http/http.dart' as http;

class StudentProvider with ChangeNotifier {
  Student _student;

  Student get student {
    return Student(
      code: _student.code,
      nom: _student.nom,
      prenom: _student.prenom,
      filiere: _student.filiere,
      email: _student.email,
      cin: _student.cin,
      cne: _student.cne,
      inscriptionDate: _student.inscriptionDate,
    );
  }

  Future<void> fetchAndSetStudent({code}) async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/getStudentByCode.php');
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
    _student = Student(
      code: int.parse(data['code_etudiant']),
      nom: data['nom'],
      prenom: data['prenom'],
      cin: data['cin'],
      cne: data['cne'],
      filiere: data['id_filiere'],
      email: data['email'],
      inscriptionDate: data['date_inscription'],
    );
    notifyListeners();
  }
}
