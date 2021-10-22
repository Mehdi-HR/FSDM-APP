import 'package:flutter/cupertino.dart';

class StudentUnit with ChangeNotifier {
  String id;
  String nom;
  String filiere;
  String annee;
  String etat;

  String codeProf;
  String nomProf;
  String prenomProf;

  StudentUnit(
      {this.id,
      this.nom,
      this.filiere,
      this.annee,
      this.etat,
      this.codeProf,
      this.nomProf,
      this.prenomProf});
}
