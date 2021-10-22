//packages
import 'dart:io';
import 'package:fsdm_app/providers/professor_student_provider.dart';
import 'package:fsdm_app/providers/professor_students_provider.dart';
import 'package:fsdm_app/providers/professor_units_provider.dart';
import 'package:fsdm_app/providers/studentsOfMajor.dart';
import 'package:provider/provider.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

//providers
import './providers/professor_provider.dart';
import './providers/student_provider.dart';
import 'models/user.dart';
import 'providers/announcements.dart';
import 'providers/student_units.dart';

//screens
import './screens/my_home_page.dart';
import './screens/splash_screen.dart';
import 'login/screens/Welcome/welcome_screen.dart';

Future<void> main() async {
  HttpOverrides.global = MyHttpOverrides();

  WidgetsFlutterBinding.ensureInitialized();
  SystemChrome.setPreferredOrientations(
      [DeviceOrientation.portraitUp, DeviceOrientation.portraitDown]);
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    //Colors
    var white = Colors.white;
    var red = Color.fromRGBO(227, 21, 25, 1);
    var light_red = Color.fromRGBO(227, 25, 94, 1);
    var light_blue = Color.fromRGBO(0, 195, 255, 1);
    var dark_blue = Color.fromRGBO(0, 119, 255, 1);
    var dark_black = Color.fromRGBO(28, 29, 28, 1);
    var black = Colors.black54;

    return MultiProvider(
      providers: [
        ChangeNotifierProvider(
          create: (_) => User(),
        ),
        ChangeNotifierProvider(
          create: (_) => Announcements(),
        ),
        ChangeNotifierProvider(
          create: (_) => StudentProvider(),
        ),
        ChangeNotifierProvider(
          create: (_) => ProfessorProvider(),
        ),
        ChangeNotifierProvider(
          create: (_) => StudentUnits(),
        ),
        ChangeNotifierProvider(
          create: (_) => ProfessorUnits(),
        ),
        ChangeNotifierProvider(
          create: (_) => ProfessorStudents(),
        ),
        ChangeNotifierProvider(
          create: (_) => StudentsOfMajor(),
        ),
      ],
      child: Consumer<User>(
        builder: (ctx, user, _) => MaterialApp(
          debugShowCheckedModeBanner: false,
          title: 'FSDM APP',
          theme: ThemeData(
            dividerColor: black,
            backgroundColor: Colors.grey[50],
            textTheme: TextTheme(
              button: TextStyle(color: light_blue),
              headline6: TextStyle(color: black),
              headline5: TextStyle(color: dark_black),
              headline2: TextStyle(color: red),
              headline3: TextStyle(color: light_red),
              headline4: TextStyle(color: dark_blue),
            ),
            fontFamily: "Montserrat",
            appBarTheme: AppBarTheme(
              backgroundColor: dark_blue,
              textTheme: TextTheme(
                headline1: TextStyle(color: white),
              ),
            ),
            accentColor: red,
          ),
          routes: {
            '/': (ctx) => user.isAuth
                ? MyHomePage()
                : FutureBuilder(
                    future: user.tryAutoLogin(),
                    builder: (_, authResultSnapshot) =>
                        authResultSnapshot.connectionState ==
                                ConnectionState.waiting
                            ? SplashScreen()
                            : WelcomeScreen()),
            MyHomePage.routeName: (ctx) => MyHomePage(),
          },
        ),
      ),
    );
  }
}

class MyHttpOverrides extends HttpOverrides {
  @override
  HttpClient createHttpClient(SecurityContext context) {
    return super.createHttpClient(context)
      ..badCertificateCallback =
          (X509Certificate cert, String host, int port) => true;
  }
}
