import 'package:flutter/material.dart';
import 'package:carousel_slider/carousel_slider.dart';
import '../models/announcement.dart';
import '../providers/announcements.dart';
import 'package:provider/provider.dart';

import 'announcement_widget.dart';

class AnnouncementCarouselWidget extends StatefulWidget {
  @override
  _AnnouncementCarouselWidgetState createState() =>
      _AnnouncementCarouselWidgetState();
}

class _AnnouncementCarouselWidgetState
    extends State<AnnouncementCarouselWidget> {
  List<Announcement> _recentAnnouncements = [];
  var isInit = true;

  var isLoading = false;
  @override
  void didChangeDependencies() {
    if (isInit) {
      setState(() {
        isLoading = true;
      });
    }
    Provider.of<Announcements>(context, listen: false)
        .fetchAndSetAnnouncements()
        .then(
      (_) {
        setState(
          () {
            _recentAnnouncements =
                Provider.of<Announcements>(context, listen: false)
                    .recentAnnouncements;
            isLoading = false;
          },
        );
      },
    );

    isInit = false;
    super.didChangeDependencies();
  }

  @override
  Widget build(BuildContext context) {
    return isLoading
        ? Container(
            margin: EdgeInsets.all(20),
            child: Center(
              child: CircularProgressIndicator(
                //color: Theme.of(context).textTheme.headline2.color,
                backgroundColor: Theme.of(context).backgroundColor,
              ),
            ),
          )
        : _recentAnnouncements.length == 0
            ? Card()
            : CarouselSlider.builder(
                options: CarouselOptions(
                  height: MediaQuery.of(context).size.height * 0.45,
                  //aspectRatio: 16 / 9,
                  viewportFraction: 0.8,
                  initialPage: 0,
                  enableInfiniteScroll: true,
                  reverse: false,
                  autoPlay: true,
                  autoPlayInterval: Duration(seconds: 3),
                  autoPlayAnimationDuration: Duration(milliseconds: 800),
                  autoPlayCurve: Curves.fastOutSlowIn,
                  enlargeCenterPage: true,
                  scrollDirection: Axis.vertical,
                ),
                itemCount: _recentAnnouncements.length,
                itemBuilder: (context, index, realIndex) => AnnouncementWidget(
                    announcement: _recentAnnouncements[index]));
  }
}
