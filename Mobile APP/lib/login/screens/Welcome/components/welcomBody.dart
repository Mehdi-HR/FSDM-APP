import 'package:flutter/material.dart';
import '../../../Screens/Login/login_screen.dart';

import '../../../Screens/Welcome/components/background.dart';
import '../../../components/rounded_button.dart';
import '../../../constants.dart';

class Body extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    // This size provide us total height and width of our screen
    return Background(
      child: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            /*Image.network(
              "https://www.guide-metiers.ma/wp-content/uploads/2019/03/Logo-Event-16.png",*/
            //height: size.height * 0.8,
            //width: MediaQuery.of(context).size.width * 0.8,
            Image.asset(
              'assets/images/fsdmlogo.png',
              fit: BoxFit.cover,
            ),

            SizedBox(height: size.height * 0.05),
            RoundedButton(
              text: "S'authentifier",
              press: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(
                    builder: (context) {
                      return LoginScreen();
                    },
                  ),
                );
              },
            ),
          ],
        ),
      ),
    );
  }
}
