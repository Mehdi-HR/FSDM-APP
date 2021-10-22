import 'package:flutter/material.dart';
import './components/loginBody.dart';

class LoginScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Authentification'),
      ),
      body: Body(),
    );
  }
}
