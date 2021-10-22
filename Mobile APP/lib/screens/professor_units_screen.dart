import 'package:flutter/material.dart';
import 'package:fsdm_app/providers/professor_units_provider.dart';
import 'package:fsdm_app/widgets/my_appbar.dart';
import 'package:fsdm_app/widgets/my_professor_drawer.dart';
import 'package:fsdm_app/widgets/professor_unit_grid.dart';

import 'package:provider/provider.dart';
import 'package:shared_preferences/shared_preferences.dart';

class ProfessorUnitsScreen extends StatefulWidget {
  @override
  _ProfessorUnitsScreenState createState() => _ProfessorUnitsScreenState();
}

class _ProfessorUnitsScreenState extends State<ProfessorUnitsScreen> {
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
        loadedUnits = Provider.of<ProfessorUnits>(context, listen: false)
            .getUnitsProfessor(code)
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
      drawer: MyProfessorDrawer(),
      body: isLoading
          ? Center(
              child: CircularProgressIndicator(),
            )
          : ProfessorUnitGrid(),
    );
  }
}
