import 'package:flutter/material.dart';
import 'package:fsdm_app/models/user.dart';
import 'package:fsdm_app/providers/authentication.dart';
import 'package:provider/provider.dart';
import '../../../../screens/my_home_page.dart';
import './background.dart';

import '../../../components/rounded_button.dart';
import '../../../components/rounded_input_field.dart';
import '../../../components//rounded_password_field.dart';

class Body extends StatefulWidget {
  @override
  _BodyState createState() => _BodyState();
}

class _BodyState extends State<Body> {
  final _form = GlobalKey<FormState>();
  var authData = {
    'email': '',
    'password': '',
  };
  void _saveForm() {
    final isValid = _form.currentState.validate();
    if (!isValid) return;
    _form.currentState.save();
  }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Background(
      child: Container(
        color: Theme.of(context).backgroundColor,
        child: SingleChildScrollView(
          child: Form(
            key: _form,
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              children: <Widget>[
                Image.asset(
                  "assets/images/fsdmlogo.png",
                  height: size.height * 0.25,
                  fit: BoxFit.cover,
                ),
                SizedBox(height: size.height * 0.01),
                RoundedInputField(
                  hintText: "Entrer votre email academique",
                  onSaved: (value) {
                    authData['email'] = value;
                  },
                ),
                RoundedPasswordField(
                  onFieldSubmitted: (_) => _saveForm(),
                  onSaved: (value) {
                    authData['password'] = value;
                  },
                ),
                RoundedButton(
                    color: Theme.of(context).textTheme.headline1.color,
                    text: "S'authentifier",
                    press: () {
                      _saveForm();
                      Provider.of<User>(context, listen: false).authenticate(
                        email: authData['email'],
                        password: authData['password'],
                      );
                      Navigator.pushNamed(context, '/');
                    }
                    /*() {
                  
                  },*/
                    ),
                SizedBox(height: size.height * 0.3),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
