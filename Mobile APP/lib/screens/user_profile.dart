import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../login/screens/Welcome/welcome_screen.dart';

import '../models/professor.dart';
import '../models/student.dart';
import '../models/user.dart';

import '../providers/professor_provider.dart';
import '../providers/student_provider.dart';

import '../widgets/my_appbar.dart';
import '../widgets/my_drawer.dart';

class UserProfile extends StatefulWidget {
  @override
  _UserProfileState createState() => _UserProfileState();
}

class _UserProfileState extends State<UserProfile> {
  var appbar = MyAppBar(
    title: 'Profil',
  );
  User user;
  Professor professor;
  Student student;
  bool isInit = true;
  bool isLoading = true;
  dynamic actualUser;
  String pr;
  int code;

  @override
  void didChangeDependencies() {
    if (isInit) {
      final prefs = SharedPreferences.getInstance().then((pref) {
        setState(() {
          code = json.decode(pref.getString('code')) as int;
        });
        Provider.of<User>(context, listen: false)
            .fetchAndSetUser(code: code.toString())
            .then((_) {
          setState(() {
            user = Provider.of<User>(context, listen: false).user;
          });
          if (user.isProf) {
            Provider.of<ProfessorProvider>(context, listen: false)
                .fetchAndSetProfessor(code: user.code.toString())
                .then(
              (_) {
                setState(() {
                  professor =
                      Provider.of<ProfessorProvider>(context, listen: false)
                          .professor;
                  isLoading = false;
                });
              },
            );
          } else {
            Provider.of<StudentProvider>(context, listen: false)
                .fetchAndSetStudent(code: user.code.toString())
                .then(
              (_) {
                setState(() {
                  student = Provider.of<StudentProvider>(context, listen: false)
                      .student;
                  isLoading = false;
                });
              },
            );
          }
        });
      });

      isInit = false;
    }

    // TODO: implement didChangeDependencies
    super.didChangeDependencies();
  }

  @override
  Widget build(BuildContext context) {
    actualUser = (student == null) ? professor : student;
    pr = (student == null) ? 'Pr. ' : '';
    return Scaffold(
      drawer: MyDrawer(),
      appBar: appbar,
      body: SingleChildScrollView(
        child: (isLoading || actualUser == null)
            ? Padding(
                padding: EdgeInsets.only(
                    top: (MediaQuery.of(context).size.height -
                            appbar.preferredSize.height -
                            MediaQuery.of(context).padding.top) *
                        0.4),
                child: Center(
                  child: CircularProgressIndicator(
                    // color: Theme.of(context).textTheme.headline2.color,
                    backgroundColor: Theme.of(context).backgroundColor,
                  ),
                ),
              )
            : Container(
                height: (MediaQuery.of(context).size.height -
                    appbar.preferredSize.height -
                    MediaQuery.of(context).padding.top),
                child: Column(
                  children: [
                    SizedBox(
                      height: 20,
                    ),
                    Container(
                      height: (MediaQuery.of(context).size.height -
                              appbar.preferredSize.height -
                              MediaQuery.of(context).padding.top) *
                          0.27,
                      width: MediaQuery.of(context).size.width * 0.90,
                      child: Card(
                        shape: RoundedRectangleBorder(
                            borderRadius:
                                BorderRadius.all(Radius.circular(25))),
                        elevation: 5,
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: [
                            //for circle avtar image
                            _getHeader(),
                            SizedBox(
                              height: 10,
                            ),
                            _profileName(
                                "$pr${actualUser.prenom} ${actualUser.nom}"),
                            SizedBox(
                              height: 10,
                            ),
                          ],
                        ),
                      ),
                    ),
                    SizedBox(
                      height: 50,
                    ),
                    _heading("Informations academiques"),
                    SizedBox(
                      height: 6,
                    ),
                    _detailsCard(),
                    Spacer(),
                    Column(
                      children: [
                        _changePasswordButton(),
                        _logoutButton(),
                      ],
                    )
                  ],
                ),
              ),
      ),
    );
  }

  Widget _getHeader() {
    return Row(
      mainAxisAlignment: MainAxisAlignment.center,
      children: [
        Container(
            padding: const EdgeInsets.all(10.0),
            child: CircleAvatar(
              backgroundColor: Theme.of(context).primaryColor,
              radius: 50,
              child: Icon(
                Icons.account_circle_sharp,
                color: Colors.white,
                size: 100,
              ),
            )),
      ],
    );
  }

  Widget _profileName(String name) {
    return Container(
      width: MediaQuery.of(context).size.width * 0.80, //80% of width,
      child: Center(
        child: FittedBox(
          child: Text(
            name,
            style: TextStyle(
                color: Theme.of(context).textTheme.headline6.color,
                fontSize: 24,
                fontWeight: FontWeight.bold),
          ),
        ),
      ),
    );
  }

  Widget _heading(String heading) {
    return Container(
      width: MediaQuery.of(context).size.width * 0.80, //80% of width,
      child: Text(
        heading,
        style: TextStyle(
          //color: Theme.of(context).textTheme.headline6.color,
          color: Theme.of(context).primaryColor,
          fontSize: 20,
        ),
      ),
    );
  }

  Widget _cardItem(IconData icon, String value) {
    return ListTile(
      leading: Icon(
        icon,
        size: 22,
        color: Theme.of(context).textTheme.headline3.color,
      ),
      title: Text(
        value,
        style: TextStyle(
            fontSize: 16, color: Theme.of(context).textTheme.headline5.color),
      ),
    );
  }

  Widget _detailsCard() {
    return Padding(
      padding: const EdgeInsets.all(8.0),
      child: Card(
        shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.all(Radius.circular(25))),
        elevation: 5,
        child: Column(
          children: [
            //row for each deatails
            _cardItem(Icons.tag, actualUser.code.toString()),
            Divider(
              height: 0.6,
            ),
            _cardItem(Icons.person, actualUser.cin),
            Divider(
              height: 0.6,
            ),
            if (actualUser == student)
              _cardItem(Icons.bookmark, actualUser.filiere),
            if (actualUser == student)
              Divider(
                height: 0.6,
              ),
            if (actualUser == student) _cardItem(Icons.school, actualUser.cne),
            if (actualUser == student)
              Divider(
                height: 0.6,
              ),
            _cardItem(Icons.alternate_email_sharp, actualUser.email),
          ],
        ),
      ),
    );
  }

  Widget _logoutButton() {
    return InkWell(
      onTap: () {
        Provider.of<User>(context, listen: false).logout();
        Navigator.pushReplacement(
          context,
          MaterialPageRoute(
            builder: (context) => WelcomeScreen(),
          ),
        );
      },
      child: Container(
          color: Theme.of(context).textTheme.headline2.color,
          child: Padding(
            padding: const EdgeInsets.all(10.0),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Icon(
                  Icons.logout,
                  color: Colors.white,
                ),
                SizedBox(width: 10),
                Text(
                  "Deconnexion",
                  style: TextStyle(color: Colors.white, fontSize: 18),
                ),
              ],
            ),
          )),
    );
  }

  Widget _changePasswordButton() {
    return InkWell(
      onTap: () {},
      child: Container(
        color: Theme.of(context).primaryColor,
        child: Padding(
          padding: const EdgeInsets.all(10.0),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Icon(
                Icons.lock,
                color: Colors.white,
              ),
              SizedBox(width: 10),
              Text(
                "Modifier votre mot de passe",
                style: TextStyle(color: Colors.white, fontSize: 18),
              )
            ],
          ),
        ),
      ),
    );
  }
}
