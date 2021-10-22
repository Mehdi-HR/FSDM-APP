import 'package:flutter/material.dart';
import 'package:fsdm_app/providers/professor_student_provider.dart';
import 'package:provider/provider.dart';

class ProfessorStudentCard extends StatelessWidget {
  var itemWidth;
  var blue;
  var black;
  var lightBlack;
  var lightBlue;
  @override
  Widget build(BuildContext context) {
    blue = Theme.of(context).primaryColor;
    lightBlue = Theme.of(context).primaryColor;

    black = Theme.of(context).textTheme.headline5.color;
    lightBlack = Theme.of(context).textTheme.headline6.color;
    itemWidth = MediaQuery.of(context).size.width * 0.6;
    final student = Provider.of<ProfessorStudent>(context, listen: false);
    return ExpansionTile(
      leading: Icon(Icons.person, color: blue),
      title: FittedBox(
        fit: BoxFit.scaleDown,
        child: Text(
          student.nom + " " + student.prenom,
          style: TextStyle(
              fontSize: 18, fontWeight: FontWeight.bold, color: black),
        ),
      ),
      children: [
        Card(
          child: Column(
            children: [
              ListTile(
                leading: Icon(Icons.label, color: blue),
                title: Text(
                  student.cne,
                  style: TextStyle(
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                    color: lightBlack,
                  ),
                ),
              ),
              ListTile(
                leading: Text(
                  "Etat :",
                  style: TextStyle(
                    fontSize: 20,
                    fontWeight: FontWeight.bold,
                    color: blue,
                  ),
                ),
                title: Text(
                  student.etat.toUpperCase(),
                  style: TextStyle(
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                    color: lightBlack,
                  ),
                ),
              ),
              ListTile(
                leading: Icon(Icons.mail, color: blue),
                title: FittedBox(
                  fit: BoxFit.cover,
                  child: Text(
                    student.email,
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.bold,
                      color: lightBlack,
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ],
    );
  }
}
