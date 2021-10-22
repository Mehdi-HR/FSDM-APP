import 'package:flutter/cupertino.dart';
import 'package:fsdm_app/providers/professor_student_provider.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

import 'professor_unit_provider.dart';

class ProfessorUnits with ChangeNotifier {
  List<ProfessorUnit> _items = [];

  List<ProfessorUnit> get items {
    return [..._items];
  }

  Future<void> getUnitsProfessor(String code) async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/professorUnits.php');
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

    final extractedData = jsonDecode(response.body);

    List<ProfessorUnit> loadedUnits = [];
    extractedData.forEach((element) {
      loadedUnits.add(ProfessorUnit(
          idModule: element['id_module'],
          nomModule: element['nom_module'],
          filiere: element['id_filiere'],
          codeEtudiant: element['code_etudiant'],
          etatEtudiant: element['etat'],
          nomEtudiant: element['nomEtudiant'],
          prenomEtudiant: element['prenomEtudiant']));
    });
    _items = loadedUnits;

    notifyListeners();
  }
}
