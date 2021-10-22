import 'package:flutter/material.dart';
import './text_field_container.dart';

class RoundedPasswordField extends StatefulWidget {
  final Function onSaved;
  final Function onFieldSubmitted;
//ValueChanged<String>
  const RoundedPasswordField({
    this.onSaved,
    this.onFieldSubmitted,
  });

  @override
  _RoundedPasswordFieldState createState() => _RoundedPasswordFieldState();
}

class _RoundedPasswordFieldState extends State<RoundedPasswordField> {
  bool _isHidden = true;

  @override
  Widget build(BuildContext context) {
    return TextFieldContainer(
      child: TextFormField(
        style: TextStyle(
          color: Theme.of(context).textTheme.headline5.color,
        ),
        validator: (value) {
          if (value.isEmpty) {
            return 'Mot de passe invalide';
          }
        },
        onFieldSubmitted: widget.onFieldSubmitted,
        onSaved: widget.onSaved,
        obscureText: _isHidden,
        cursorColor: Theme.of(context).textTheme.headline4.color,
        decoration: InputDecoration(
          labelStyle: TextStyle(
            fontSize: 16,
          ),
          errorStyle: TextStyle(
            color: Theme.of(context).textTheme.headline2.color,
            fontSize: 16,
          ),
          labelText: 'Mot de passe',
          //hintText: "Entrer votre mot de passe",
          icon: Icon(
            Icons.lock,
            color: Theme.of(context).textTheme.button.color,
          ),
          suffix: InkWell(
            onTap: _togglePasswordView,
            child: Icon(
              _isHidden ? Icons.visibility : Icons.visibility_off,
              color: Theme.of(context).textTheme.headline6.color,
            ),
          ),
          border: InputBorder.none,
        ),
      ),
    );
  }

  void _togglePasswordView() {
    setState(() {
      _isHidden = !_isHidden;
    });
  }
}
