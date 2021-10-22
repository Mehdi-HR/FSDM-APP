import 'package:flutter/material.dart';
import 'package:fsdm_app/screens/professor_units_screen.dart';

class MyProfessorDrawer extends StatefulWidget {
  @override
  _MyProfessorDrawerState createState() => _MyProfessorDrawerState();
}

class _MyProfessorDrawerState extends State<MyProfessorDrawer> {
  final padding = EdgeInsets.symmetric(horizontal: 20);

  @override
  Widget build(BuildContext context) {
    final urlImage =
        'https://www.guide-metiers.ma/wp-content/uploads/2019/03/Logo-Event-16.png';

    return Drawer(
      child: Material(
        color: Colors.white,
        child: ListView(
          children: <Widget>[
            buildHeader(
              urlImage: urlImage,
              onClicked: () {},
            ),
            Container(
              padding: padding,
              child: Column(
                children: [
                  const SizedBox(height: 24),
                  ListTile(
                    onTap: () =>
                        Navigator.of(context).pushReplacementNamed('/home'),
                    leading: Icon(
                      Icons.home,
                      color: Theme.of(context).textTheme.headline4.color,
                    ),
                    title: Text(
                      'Accueil',
                      style: TextStyle(
                        color: Theme.of(context).textTheme.headline4.color,
                      ),
                    ),
                  ),
                  const SizedBox(height: 16),
                  ExpansionTile(
                    title: Text(
                      'Informations',
                      style: TextStyle(
                          color: Theme.of(context).textTheme.headline4.color),
                    ),
                    leading: Icon(
                      Icons.list,
                      color: Theme.of(context).textTheme.headline4.color,
                    ),
                    children: <Widget>[
                      // buildMenuItem(
                      //   text: 'Liste d\'etudiants',
                      //   icon: Icons.group,
                      //   onClicked: () => selectedItem(context, 1),
                      // ),
                      buildMenuItem(
                        text: 'Emploi du temps',
                        icon: Icons.schedule,
                        onClicked: () => selectedItem(context, 1),
                      ),
                      buildMenuItem(
                        text: 'Modules',
                        icon: Icons.class__outlined,
                        onClicked: () => Navigator.pushReplacement(
                          context,
                          MaterialPageRoute(
                            builder: (context) => ProfessorUnitsScreen(),
                          ),
                        ),
                      ),
                      ExpansionTile(
                        leading: Icon(
                          Icons.assignment_outlined,
                          color: Theme.of(context).textTheme.headline5.color,
                        ),
                        title: Text(
                          'Examens',
                          style: TextStyle(
                              color:
                                  Theme.of(context).textTheme.headline5.color),
                        ),
                        children: <Widget>[
                          buildMenuItem(
                            text: 'Planning des examens',
                            icon: Icons.event,
                            onClicked: () => selectedItem(context, 1),
                          ),
                          // buildMenuItem(
                          //   text: 'Place d\'examens',
                          //   icon: Icons.event_seat_rounded,
                          //   onClicked: () => selectedItem(context, 1),
                          // ),
                          // buildMenuItem(
                          //   text: 'Resultats',
                          //   icon: Icons.school_sharp,
                          //   onClicked: () => selectedItem(context, 1),
                          // ),
                        ],
                      ),
                    ],
                  ),
                  const SizedBox(height: 16),
                  ListTile(
                      leading: Icon(
                        Icons.announcement,
                        color: Theme.of(context).textTheme.headline4.color,
                      ),
                      title: Text(
                        'Annonces',
                        style: TextStyle(
                          color: Theme.of(context).textTheme.headline4.color,
                        ),
                      )),
                  const SizedBox(height: 60),
                  Divider(
                    thickness: 1.1,
                  ),
                  ListTile(
                      leading: Icon(
                        Icons.info,
                        color: Theme.of(context).textTheme.headline4.color,
                      ),
                      title: Text(
                        'A propos',
                        style: TextStyle(
                          color: Theme.of(context).textTheme.headline4.color,
                        ),
                      )),
                  ListTile(
                    leading: Icon(
                      Icons.logout,
                      color: Theme.of(context).textTheme.headline2.color,
                    ),
                    title: Text(
                      'Deconnexion',
                      style: TextStyle(
                          color: Theme.of(context).textTheme.headline2.color),
                    ),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget buildHeader({
    @required String urlImage,
    @required VoidCallback onClicked,
  }) =>
      InkWell(
        onTap: onClicked,
        child: DrawerHeader(
          child: Container(),
          decoration: BoxDecoration(
            image: DecorationImage(
              image: /*NetworkImage(urlImage),*/ AssetImage(
                  'assets/images/fsdmlogo.png'),
              fit: BoxFit.cover,
            ),
          ),
        ),
      );

  Widget buildMenuItem({
    @required String text,
    Color textColor,
    @required IconData icon,
    Color iconColor,
    VoidCallback onClicked,
  }) {
    return ListTile(
      leading: Icon(icon, color: iconColor),
      title: Text(text, style: TextStyle(color: textColor)),
      onTap: onClicked,
    );
  }

  void selectedItem(BuildContext context, int index) {
    Navigator.of(context).pop();
  }
}
