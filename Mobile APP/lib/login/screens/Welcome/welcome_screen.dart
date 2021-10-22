import 'package:flutter/material.dart';
import '../../Screens/Welcome/components/welcomBody.dart';

class WelcomeScreen extends StatelessWidget {
  static const routeName = '/welcome';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Body(),
    );
  }
}
