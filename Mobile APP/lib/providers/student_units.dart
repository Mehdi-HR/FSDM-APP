import 'dart:convert';

import 'package:http/http.dart' as http;
import 'package:flutter/cupertino.dart';
import 'package:fsdm_app/models/student_unit.dart';

class StudentUnits with ChangeNotifier {
  List<StudentUnit> _items = [];

  List<StudentUnit> get items {
    return [..._items];
  }

  Future<void> getUnits(String code) async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/studentsUnits.php');
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
    /////{"id_module","nom_module" ,"annee_universitaire",
    ///"etat","id_filiere","code_prof","nom","prenom"}

    final extractedData = jsonDecode(response.body);

    List<StudentUnit> loadedUnits = [];
    extractedData.forEach((element) {
      loadedUnits.add(StudentUnit(
        id: element['id_module'],
        nom: element['nom_module'],
        filiere: element['id_filiere'],
        annee: element['annee_universitaire'],
        etat: element['etat'],
        codeProf: element['code_prof'],
        nomProf: element['nom'],
        prenomProf: element['prenom'],
      ));
    });
    _items = loadedUnits;

    notifyListeners();
  }
}
