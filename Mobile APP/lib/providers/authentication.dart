// import 'dart:convert';
// import 'package:shared_preferences/shared_preferences.dart';
// import 'package:flutter/foundation.dart';
// import 'package:http/http.dart' as http;

// class Authentication extends ChangeNotifier {
//   var String email;
//   var String password;

//   Authentication({@required this.email, @required this.password});

//   Future<bool> authenticate() async {
//     var url = Uri.parse('https://10.0.2.2/fsdm_api/auth.php');
//     var response = await http.post(
//       url,
//       body: {
//         'email': this.email,
//         'password': this.password,
//       },
//     ).then((value) {
//       if (value.statusCode != 200) {
//         print('connection failed');
//         return false;
//       }
//       if (value.body.isEmpty) {
//         print('no response');
//         return false;
//       }
//       var userData = jsonDecode(value.body);
//       print('Response : $userData');
//       final prefs = SharedPreferences.getInstance().then((pref) {
//         pref.setString(
//           'code',
//           userData['code'],
//         );

//       });
//     });
//   }
// }

// Future<bool> tryAutoLogin() async {
//     final prefs = await SharedPreferences.getInstance();
//     if (!prefs.containsKey('userData')) {
//       return false;
//     }
//     final extractedUserData = json.decode(prefs.getString('userData')) as Map<String, Object>;
//     final expiryDate = DateTime.parse(extractedUserData['expiryDate']);

//     if (expiryDate.isBefore(DateTime.now())) {
//       return false;
//     }
//     _token = extractedUserData['token'];
//     _userId = extractedUserData['userId'];
//     _expiryDate = expiryDate;
//     notifyListeners();
//     _autoLogout();
//     return true;
//   }

// Future<void> logout() async {
//   _token = null;
//   _userId = null;
//   _expiryDate = null;
//   if (_authTimer != null) {
//     _authTimer.cancel();
//     _authTimer = null;
//   }
//   notifyListeners();
//   final prefs = await SharedPreferences.getInstance();
//   // prefs.remove('userData');
//   prefs.clear();
// }
