class Announcement {
  final int id;
  final String title;
  final String content;
  final DateTime date;

  Announcement({this.id, this.title, this.content, this.date});

  bool get isRecent => date.isAfter(DateTime.now().subtract(Duration(days: 7)));
}
