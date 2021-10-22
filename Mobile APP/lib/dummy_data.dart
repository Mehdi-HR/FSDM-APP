import 'models/announcement.dart';

class DummyData {
  //Announcements
  final announcements = [
    Announcement(
      title:
          'title 1 title 1 title 1 title 1 title 1 title 1 title 1 title 1 Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolorsit ametLorem ipsum dolorsit ametLorem ipsum dolor sit ametLorem ipsum dolorsit ametLorem ipsum dolorsit ametLorem ipsum dolor ',
      content:
          'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus.',
      date: DateTime.now(),
    ),
    Announcement(
      title: 'title 2',
      content:
          'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.',
      date: DateTime.now().subtract(Duration(days: 8)),
    ),
    Announcement(
      title: 'title 3',
      content:
          'Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.',
      date: DateTime.now().subtract(Duration(days: 5)),
    ),
  ];

  List<Announcement> get recentAnnouncements =>
      announcements.where((announcement) => announcement.isRecent).toList();
}
