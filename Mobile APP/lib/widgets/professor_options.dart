import 'package:flutter/material.dart';
import 'package:fsdm_app/screens/professor_units_screen.dart';

import '../widgets/my_list_tile.dart';

class ProfessorOptions extends StatelessWidget {
  const ProfessorOptions({
    @required this.height,
  });

  final double height;

  @override
  Widget build(BuildContext context) {
    return Container(
      height: height,
      child: ListView(
        children: [
          Theme(
            data: Theme.of(context).copyWith(dividerColor: Colors.transparent),
            child: ExpansionTile(
              tilePadding: EdgeInsets.all(10),
              leading: Icon(
                Icons.list,
                size: 36,
              ),
              initiallyExpanded: true,
              title: Text(
                'Informations',
                style: TextStyle(
                  fontSize: 28,
                ),
              ),
              children: [
                // MyListile(
                //   title: 'Liste des etudiants',
                //   icon: Icons.group,
                //   titleColor: Theme.of(context).primaryColor,
                //   iconColor: Theme.of(context).primaryColor,
                // ),
                MyListile(
                  title: 'Emploi du temps',
                  icon: Icons.schedule,
                  titleColor: Theme.of(context).primaryColor,
                  iconColor: Theme.of(context).primaryColor,
                ),
                SizedBox(
                  height: 10,
                ),
                MyListile(
                  title: 'Modules',
                  icon: Icons.class__outlined,
                  titleColor: Theme.of(context).primaryColor,
                  iconColor: Theme.of(context).primaryColor,
                  onClicked: () => Navigator.pushReplacement(
                    context,
                    MaterialPageRoute(
                      builder: (context) => ProfessorUnitsScreen(),
                    ),
                  ),
                ),
                Theme(
                  data: Theme.of(context)
                      .copyWith(dividerColor: Colors.transparent),
                  child: ExpansionTile(
                    tilePadding: EdgeInsets.all(8),
                    leading: Icon(
                      Icons.assignment_outlined,
                      size: 36,
                    ),
                    initiallyExpanded: false,
                    title: Text(
                      'Examens',
                      style: TextStyle(
                        fontSize: 24,
                      ),
                    ),
                    children: [
                      MyListile(
                        title: 'Plannings d\'examens',
                        icon: Icons.event,
                        titleColor: Theme.of(context).primaryColor,
                        iconColor: Theme.of(context).primaryColor,
                      ),
                      // MyListile(
                      //   title: 'Places d\'examens',
                      //   icon: Icons.event_seat,
                      //   titleColor: Theme.of(context).primaryColor,
                      //   iconColor: Theme.of(context).primaryColor,
                      // ),
                      // MyListile(
                      //   title: 'Resultats',
                      //   icon: Icons.school,
                      //   titleColor: Theme.of(context).primaryColor,
                      //   iconColor: Theme.of(context).primaryColor,
                      // ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
