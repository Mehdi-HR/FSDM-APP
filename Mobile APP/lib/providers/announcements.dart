import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

import '../models/announcement.dart';

class Announcements with ChangeNotifier {
  List<Announcement> _announcements = [];

  List<Announcement> get recentAnnouncements =>
      _announcements.where((announcement) => announcement.isRecent).toList();

  Future<void> fetchAndSetAnnouncements() async {
    var url = Uri.parse('https://10.0.2.2/fsdm_api/announcements.php');
    var response = await http.get(url);
    if (response.statusCode != 200) {
      print('connection failed');
      return;
    }
    if (response.body.isEmpty) {
      print('no response');
      return;
    }
    var data = jsonDecode(response.body) as List<dynamic>;
    data.forEach(
      (element) {
        _announcements.add(
          Announcement(
            id: int.parse(element['id']),
            title: element['titre'],
            content: element['contenu'],
            date: DateTime.parse(element['date_publication']),
          ),
        );
      },
    );
    notifyListeners();
  }
}
