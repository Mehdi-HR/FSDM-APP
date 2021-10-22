import 'package:flutter/material.dart';
import 'package:fsdm_app/providers/professor_unit_provider.dart';
import 'package:fsdm_app/screens/professor_student_screen.dart';
import 'package:provider/provider.dart';

class ProfessorUnitCard extends StatelessWidget {
  var black;
  var lightBlack;
  var lightBlue;
  var blue;

  @override
  Widget build(BuildContext context) {
    blue = Theme.of(context).primaryColor;
    lightBlue = Theme.of(context).primaryColor;

    black = Theme.of(context).textTheme.headline5.color;
    lightBlack = Theme.of(context).textTheme.headline6.color;
    final unit = Provider.of<ProfessorUnit>(context, listen: false);
    return ExpansionTile(
      title: Text('Filiere:  ' + unit.filiere,
          style: TextStyle(
            fontSize: 18,
            fontWeight: FontWeight.bold,
            color: black,
          )),
      children: [
        ListTile(
          title: FittedBox(
            fit: BoxFit.scaleDown,
            child: Text(unit.nomModule,
                style: TextStyle(
                    fontSize: 18, fontWeight: FontWeight.bold, color: blue)),
          ),
        ),
        ListTile(
          leading: Icon(Icons.label, color: blue),
          title: Text(
            'Liste des etudiants',
            style: TextStyle(
                fontSize: 18, fontWeight: FontWeight.bold, color: black),
          ),
          onTap: () => Navigator.push(
            context,
            MaterialPageRoute(
              builder: (context) => ProfessorStudentScreen(
                code: unit.idModule,
                nom: unit.nomModule,
              ),
            ),
          ),
          trailing: Icon(Icons.arrow_forward, color: blue),
        ),
      ],
    );
  }
}
