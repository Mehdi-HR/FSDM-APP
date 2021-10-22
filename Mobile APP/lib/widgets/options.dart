import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../models/user.dart';

import './professor_options.dart';
import './student_options.dart';

class Options extends StatefulWidget {
  final height;

  const Options({this.height});

  @override
  _OptionsState createState() => _OptionsState();
}

class _OptionsState extends State<Options> {
  bool isInit = true;
  bool isLoading = true;
  bool isProf = true;
  var code;
  var user;
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
            setState(() {
              isProf = true;
              isLoading = false;
            });
          } else {
            setState(() {
              isProf = false;
              isLoading = false;
            });
          }
          isInit = false;
        });
      });
    }
    // TODO: implement didChangeDependencies
    super.didChangeDependencies();
  }

  @override
  Widget build(BuildContext context) {
    return isProf
        ? ProfessorOptions(
            height: widget.height,
          )
        : StudentOptions(
            height: widget.height,
          );
  }
}
