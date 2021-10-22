import 'package:flutter/cupertino.dart';
import 'package:fsdm_app/providers/professor_student_provider.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class ProfessorStudents with ChangeNotifier {
  List<ProfessorStudent> _items = [];

  List<ProfessorStudent> get items {
    return [..._items];
  }

  Future<void> getProfessorStudents(String code) async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/professorStudent.php');
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
    List<ProfessorStudent> loadedUnits = [];
    extractedData.forEach((element) {
      loadedUnits.add(ProfessorStudent(
          cne: element['cne'],
          code: element['code_etudiant'],
          etat: element['etat'],
          nom: element['nom'],
          prenom: element['prenom'],
          email: element['email']));
    });
    _items = loadedUnits;

    notifyListeners();
  }
}
