import 'package:flutter/material.dart';

class StudentOfMajor with ChangeNotifier {
  String nom;
  String prenom;
  String email;
  String inscriptionDate;
  String cne;
  String etat;

  StudentOfMajor({
    this.nom,
    this.prenom,
    this.inscriptionDate,
    this.email,
    this.cne,
    this.etat,
  });
}
//{"nom":"BOUKIR","prenom":"AHMED","cne":"2724807668","email":"ahmed.boukir@usmba.ac.ma","date_inscription":"18-09-2019"}
