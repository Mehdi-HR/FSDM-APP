import 'package:flutter/material.dart';
import 'package:fsdm_app/models/announcement.dart';
import 'package:fsdm_app/screens/announcement_screen.dart';

class AnnouncementWidget extends StatelessWidget {
  final Announcement announcement;

  const AnnouncementWidget({this.announcement});

  @override
  Widget build(BuildContext context) {
    return Container(
      width: MediaQuery.of(context).size.width * 1,
      color: Theme.of(context).backgroundColor,
      child: Card(
        shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.all(Radius.circular(28))),
        borderOnForeground: false,
        child: TextButton(
          onPressed: () => Navigator.push(
            context,
            MaterialPageRoute(
              builder: (ctx) => AnnouncementScreen(
                announcement: announcement,
              ),
            ),
          ),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Opacity(
                opacity: 1,
                child:
                    /*Image.network(
                  'https://www.guide-metiers.ma/wp-content/uploads/2019/03/Logo-Event-16.png',
                  */
                    Image.asset(
                  'assets/images/fsdmlogo.png',
                  fit: BoxFit.cover,
                  height: MediaQuery.of(context).size.height * 0.24,
                ),
              ),
              SizedBox(
                height: MediaQuery.of(context).size.height * 0.03,
              ),
              SizedBox(
                height: MediaQuery.of(context).size.height * 0.06,
                child: SingleChildScrollView(
                  child: Text(
                    announcement.title,
                    textAlign: TextAlign.center,
                    style: TextStyle(
                      color: Theme.of(context).textTheme.headline3.color,
                      fontWeight: FontWeight.bold,
                      fontSize: 20,
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
