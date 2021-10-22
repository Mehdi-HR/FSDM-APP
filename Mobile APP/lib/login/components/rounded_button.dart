import 'package:flutter/material.dart';

class RoundedButton extends StatelessWidget {
  static const Color _color = Color.fromRGBO(0, 195, 255, 1);
  final String text;
  final Function press;
  final Color color, textColor;
  const RoundedButton({
    this.text,
    this.press,
    this.color = _color,
    this.textColor = Colors.white,
  });

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Container(
      margin: EdgeInsets.symmetric(vertical: 20),
      height: size.width * 0.08,
      width: size.width * 0.4,
      child: ElevatedButton(
        onPressed: press,
        child: Text(
          text,
          style: TextStyle(
            color: textColor,
            fontSize: 16,
            fontWeight: FontWeight.bold,
          ),
        ),
      ),
    );
  }
}
