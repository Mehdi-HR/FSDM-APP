import 'package:flutter/material.dart';
import 'package:flutter_html/flutter_html.dart';
import '../models/announcement.dart';
import '../widgets/my_appbar.dart';

class AnnouncementScreen extends StatelessWidget {
  final Announcement announcement;

  const AnnouncementScreen({this.announcement});

  @override
  Widget build(BuildContext context) {
    //appbar
    var appbar = MyAppBar(
      title: announcement.title,
    );
    return Scaffold(
      appBar: appbar,
      body: SafeArea(
        child: SingleChildScrollView(
          child: Container(
            color: Theme.of(context).backgroundColor,
            child: Card(
              elevation: 3,
              child: ListTile(
                subtitle: Column(
                  children: [
                    SizedBox(
                      height: MediaQuery.of(context).size.height * 0.03,
                    ),
                    /*Image.network(
                      'https://www.guide-metiers.ma/wp-content/uploads/2019/03/Logo-Event-16.png',
                      */
                    Image.asset(
                      'assets/images/fsdmlogo.png',
                      fit: BoxFit.cover,
                      height: MediaQuery.of(context).size.height * 0.28,
                    ),
                    SizedBox(
                      height: MediaQuery.of(context).size.height * 0.03,
                    ),
                    SizedBox(
                      height: MediaQuery.of(context).size.height * 0.1,
                      child: SingleChildScrollView(
                        child: Text(
                          announcement.title,
                          textAlign: TextAlign.center,
                          style: TextStyle(
                            color: Theme.of(context).textTheme.headline3.color,
                            fontWeight: FontWeight.bold,
                            fontSize: 33,
                          ),
                        ),
                      ),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Container(
                      padding: EdgeInsets.all(8),
                      child: Html(
                        data: announcement.content,
                        //shrinkToFit: true,
                        defaultTextStyle: TextStyle(
                            color: Theme.of(context).textTheme.headline6.color,
                            fontSize: 24),
                        renderNewlines: true,
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ),
        ),
      ),
    );
  }
}
