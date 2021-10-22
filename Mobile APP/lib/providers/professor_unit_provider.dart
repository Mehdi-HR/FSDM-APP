import 'package:flutter/cupertino.dart';

class ProfessorUnit with ChangeNotifier {
  final String nomModule;
  final String idModule;
  final String filiere;
  final String codeEtudiant;
  final String etatEtudiant;
  final String nomEtudiant;
  final String prenomEtudiant;

  ProfessorUnit(
      {this.codeEtudiant,
      this.etatEtudiant,
      this.nomEtudiant,
      this.prenomEtudiant,
      this.nomModule,
      this.idModule,
      this.filiere});
}
//"code_etudiant":"8897","id_module":"I01","annee_universitaire":"2020-2021","etat":"inscrit",
//"note":null,"code_prof":"14342","nom_module":"Analyse 1","id_filiere":"SMI","id_semestre":"1"
