import 'package:flutter/material.dart';
import 'package:fsdm_app/providers/studentsOfMajor.dart';
import 'package:fsdm_app/widgets/major_list.dart';
import 'package:fsdm_app/widgets/my_appbar.dart';
import 'package:fsdm_app/widgets/my_student_drawer.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

class MajorListScreen extends StatefulWidget {
  @override
  _MajorListScreenState createState() => _MajorListScreenState();
}

class _MajorListScreenState extends State<MajorListScreen> {
  bool _initialState = true;
  bool isLoading = false;
  String code;
  var loadedUnits;
  @override
  void didChangeDependencies() {
    if (_initialState) {
      setState(() {
        isLoading = true;
      });
      final prefs = SharedPreferences.getInstance().then((prefs) {
        code = prefs.getString('code');
        loadedUnits = Provider.of<StudentsOfMajor>(context, listen: false)
            .getMajorList(code)
            .then((value) {
          setState(() {
            isLoading = false;
          });
        });
      });
    }
    _initialState = false;
    super.didChangeDependencies();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: MyAppBar(
        title: 'Liste d\'etudiants',
      ),
      drawer: MyStudentDrawer(),
      body: isLoading
          ? Center(
              child: CircularProgressIndicator(),
            )
          : MajorList(),
    );
  }
}
