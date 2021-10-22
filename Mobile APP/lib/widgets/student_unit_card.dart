import 'package:flutter/material.dart';
import 'package:fsdm_app/models/student_unit.dart';
import 'package:provider/provider.dart';

class StudentUnitCard extends StatelessWidget {
  var itemWidth;
  @override
  Widget build(BuildContext context) {
    var color = Theme.of(context).textTheme.headline5.color;
    var iconColor = Theme.of(context).textTheme.headline4.color;
    final unit = Provider.of<StudentUnit>(context, listen: false);
    itemWidth = MediaQuery.of(context).size.width * 0.6;

    return ExpansionTile(
      leading: Icon(Icons.label_important_rounded),
      title: new Text(unit.nom,
          style: TextStyle(
              fontWeight: FontWeight.w700,
              fontSize: 20,
              color: Theme.of(context).textTheme.headline5.color)),
      children: <Widget>[
        Card(
          color: Theme.of(context).backgroundColor,
          elevation: 3,
          child: Column(
            children: [
              Divider(
                height: 5,
                thickness: 1,
              ),
              SizedBox(
                height: 5,
              ),
              _buildCard(
                width: itemWidth,
                icon: Icons.label,
                iconColor: iconColor,
                textColor: color,
                title: 'id',
                value: unit.id,
              ),
              _buildCard(
                icon: Icons.book,
                iconColor: iconColor,
                textColor: color,
                title: 'Intitule',
                value: unit.nom,
              ),
              _buildCard(
                icon: Icons.person,
                iconColor: iconColor,
                textColor: color,
                title: 'Professeur',
                value: unit.nomProf + " " + unit.prenomProf,
              ),
            ],
          ),
        )
      ],
    );
  }
}

Widget _buildCard({
  Color iconColor,
  Color textColor,
  IconData icon,
  String title,
  String value,
  var width,
}) {
  return ListTile(
    leading: Icon(
      icon,
      color: iconColor,
    ),
    title: Row(
      mainAxisAlignment: MainAxisAlignment.start,
      children: [
        Flexible(
          child: FittedBox(
            fit: BoxFit.scaleDown,
            child: Text(
              '$title :',
              maxLines: 1,
              style: TextStyle(
                color: textColor,
                fontSize: 23,
                fontWeight: FontWeight.w500,
              ),
            ),
          ),
        ),
        SizedBox(
          width: 20,
        ),
        Flexible(
          flex: 2,
          child: FittedBox(
            fit: BoxFit.contain,
            child: Text(
              value,
              maxLines: 1,
              style: TextStyle(
                color: textColor,
                fontSize: 20,
                fontWeight: FontWeight.w500,
              ),
            ),
          ),
        ),
      ],
    ),
  );
}
