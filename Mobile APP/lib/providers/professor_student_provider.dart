import 'package:flutter/cupertino.dart';

class ProfessorStudent with ChangeNotifier {
  String code;
  String nom;
  String prenom;
  String email;
  String inscriptionDate;
  String cne;
  String etat;

  ProfessorStudent({
    this.code,
    this.nom,
    this.prenom,
    this.inscriptionDate,
    this.email,
    this.cne,
    this.etat,
  });
}
