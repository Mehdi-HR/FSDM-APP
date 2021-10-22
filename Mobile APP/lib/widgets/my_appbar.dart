import 'package:flutter/material.dart';
import '../screens/user_profile.dart';

class MyAppBar extends StatelessWidget with PreferredSizeWidget {
  final String title;

  const MyAppBar({this.title});

  @override
  Widget build(BuildContext context) {
    return AppBar(
      actions: [
        IconButton(
          icon: Icon(Icons.account_circle_rounded),
          onPressed: () => Navigator.pushReplacement(
            context,
            MaterialPageRoute(
              builder: (context) => UserProfile(),
            ),
          ),
        )
      ],
      centerTitle: true,
      title: Text(title,
          style: TextStyle(
            color: Theme.of(context).appBarTheme.textTheme.headline1.color,
            fontWeight: FontWeight.bold,
          )),
    );
  }

  @override
  // TODO: implement preferredSize
  Size get preferredSize => Size.fromHeight(60.0);
}
