import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../providers/student_units.dart';

import '../widgets/my_appbar.dart';
import '../widgets/my_student_drawer.dart';
import '../widgets/student_unit_list.dart';

class UnitsScreen extends StatefulWidget {
  @override
  _UnitsScreenState createState() => _UnitsScreenState();
}

class _UnitsScreenState extends State<UnitsScreen> {
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
        loadedUnits = Provider.of<StudentUnits>(context, listen: false)
            .getUnits(code)
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
        title: 'Modules',
      ),
      drawer: MyStudentDrawer(),
      body: isLoading
          ? Center(
              child: CircularProgressIndicator(),
            )
          : StudentUnitlist(),
    );
  }
}
