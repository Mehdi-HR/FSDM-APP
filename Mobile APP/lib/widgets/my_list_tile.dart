import 'package:flutter/material.dart';

class MyListile extends StatelessWidget {
  final String title;
  final IconData icon;
  final Color titleColor;
  final Color iconColor;
  final Function onClicked;
  const MyListile({
    @required this.title,
    @required this.icon,
    @required this.titleColor,
    @required this.iconColor,
    this.onClicked,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      elevation: 4,
      child: ListTile(
        onTap: onClicked,
        leading: Icon(
          icon,
          size: 30,
          color: iconColor,
        ),
        title: Text(
          title,
          style: TextStyle(
            fontSize: 20,
            color: titleColor,
          ),
        ),
      ),
    );
  }
}
