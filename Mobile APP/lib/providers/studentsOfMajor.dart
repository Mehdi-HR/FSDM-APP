import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:http/http.dart' as http;

import 'package:fsdm_app/providers/student_major.dart';

class StudentsOfMajor with ChangeNotifier {
  List<StudentOfMajor> _items = [];

  List<StudentOfMajor> get items {
    return [..._items];
  }

  Future<void> getMajorList(String code) async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/studentMajorList.php');
    var response = await http.post(
      url,
      body: {
        'code': code,
      },
    );

    print(code);

    if (response.statusCode != 200) {
      print('connection failed');

      return;
    }
    if (response.body.isEmpty) {
      print('no response');

      return;
    }

    final extractedData = jsonDecode(response.body);
//{"code_etudiant":"16107","id_module":"B14","annee_universitaire":"2019-2020","etat":"valide",
//"note":"19","nom":"ELOUARDI","prenom":"NISRINE","cin":"CD353019",
//"date_inscription":"18-09-2019","email":"nisrine.elouardi@usmba.ac.ma","cne":"1127743636","id_filiere":"SVI"}
    List<StudentOfMajor> loadedUnits = [];
    extractedData.forEach((element) {
      loadedUnits.add(StudentOfMajor(
          cne: element['cne'],
          inscriptionDate: element['date_inscription'],
          etat: element['etat'],
          nom: element['nom'],
          prenom: element['prenom'],
          email: element['email']));
    });
    _items = loadedUnits;

    notifyListeners();
  }
}
