import 'package:flutter/material.dart';
import 'package:fsdm_app/providers/professor_students_provider.dart';

import 'package:fsdm_app/widgets/my_appbar.dart';

import 'package:fsdm_app/widgets/professor_student_list.dart';

import 'package:provider/provider.dart';

class ProfessorStudentScreen extends StatefulWidget {
  final String code;
  final String nom;

  const ProfessorStudentScreen({this.code, this.nom});

  @override
  _ProfessorStudentScreenState createState() => _ProfessorStudentScreenState();
}

class _ProfessorStudentScreenState extends State<ProfessorStudentScreen> {
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
      final String idM = widget.code;

      loadedUnits = Provider.of<ProfessorStudents>(context, listen: false)
          .getProfessorStudents(idM)
          .then((_) {
        setState(() {
          isLoading = false;
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
        title: widget.nom,
      ),
      // drawer: MyProfessorDrawer(),
      body: isLoading
          ? Center(
              child: CircularProgressIndicator(),
            )
          : ProfessorStudentList(),
    );
  }
}
