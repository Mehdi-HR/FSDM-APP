import 'package:flutter/material.dart';
import './text_field_container.dart';
import '../constants.dart';

class RoundedInputField extends StatelessWidget {
  final String hintText;
  final IconData icon;
  final Function onSaved;
  const RoundedInputField({
    Key key,
    this.hintText,
    this.icon = Icons.person,
    this.onSaved,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return TextFieldContainer(
      child: TextFormField(
        style: TextStyle(
          color: Theme.of(context).textTheme.headline5.color,
        ),
        validator: (value) {
          if (value.isEmpty || !value.contains('@')) {
            return 'Email invalide';
          }
        },
        keyboardType: TextInputType.emailAddress,
        onSaved: onSaved,
        textInputAction: TextInputAction.next,
        cursorColor: Theme.of(context).textTheme.button.color,
        decoration: InputDecoration(
          labelStyle: TextStyle(
            fontSize: 16,
          ),
          errorStyle: TextStyle(
            color: Theme.of(context).textTheme.headline2.color,
            fontSize: 16,
          ),
          labelText: 'Email Academique',
          icon: Icon(
            icon,
            color: Theme.of(context).textTheme.button.color,
          ),
          //hintText: hintText,
          border: InputBorder.none,
        ),
      ),
    );
  }
}
