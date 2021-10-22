import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../providers/announcements.dart';

import '../widgets/my_drawer.dart';
import '../widgets/options.dart';
import '../widgets/announcements_carousel_widget.dart';
import '../widgets/my_appbar.dart';

class MyHomePage extends StatefulWidget {
  static const String routeName = '/home';
  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  //appbar
  var appbar = MyAppBar(
    title: 'Fsdm App',
  );

  Future<void> _refreshAnnouncements(context) async {
    await Provider.of<Announcements>(context, listen: false)
        .fetchAndSetAnnouncements();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Theme.of(context).backgroundColor,
      drawer: MyDrawer(),
      appBar: appbar,
      body: Container(
        height: (MediaQuery.of(context).size.height -
                appbar.preferredSize.height -
                MediaQuery.of(context).padding.top) *
            1,
        margin: EdgeInsets.all(0),
        child: RefreshIndicator(
          onRefresh: () => _refreshAnnouncements(context),
          child: Column(
            children: [
              AnnouncementCarouselWidget(),
              Options(
                height: (MediaQuery.of(context).size.height -
                        appbar.preferredSize.height -
                        MediaQuery.of(context).padding.top) *
                    0.43,
              ),
            ],
          ),
        ),
      ),
    );
  }
}
