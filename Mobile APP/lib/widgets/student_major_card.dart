import 'package:flutter/material.dart';
import 'package:fsdm_app/providers/student_major.dart';
import 'package:provider/provider.dart';

class StudentMajorCard extends StatelessWidget {
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
    //var  itemWidth = MediaQuery.of(context).size.width * 0.6;
    final student = Provider.of<StudentOfMajor>(context, listen: false);
    print(student.inscriptionDate);
    return ExpansionTile(
      leading: Icon(Icons.person, color: blue),
      title: FittedBox(
        fit: BoxFit.scaleDown,
        child: Text(
          student.nom + " " + student.prenom,
          textAlign: TextAlign.start,
          style: TextStyle(
            fontSize: 16,
            fontWeight: FontWeight.bold,
            color: black,
          ),
        ),
      ),
      children: [
        Card(
          child: Column(
            children: [
              ListTile(
                leading: Icon(Icons.label, color: lightBlue),
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
                  "Inscrit le:",
                  style: TextStyle(
                    fontSize: 20,
                    fontWeight: FontWeight.bold,
                    color: lightBlue,
                  ),
                ),
                title: Text(
                  student.inscriptionDate.toUpperCase(),
                  style: TextStyle(
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                    color: lightBlack,
                  ),
                ),
              ),
              ListTile(
                leading: Icon(
                  Icons.mail,
                  color: lightBlue,
                ),
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
