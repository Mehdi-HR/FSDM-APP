import 'package:flutter/material.dart';

import 'package:fsdm_app/providers/professor_students_provider.dart';
import 'package:fsdm_app/providers/professor_units_provider.dart';

import 'package:fsdm_app/widgets/professor_student_card.dart';

import 'package:provider/provider.dart';

class ProfessorStudentList extends StatefulWidget {
  @override
  _ProfessorStudentListState createState() => _ProfessorStudentListState();
}

class _ProfessorStudentListState extends State<ProfessorStudentList> {
  @override
  Widget build(BuildContext context) {
    final studentsData = Provider.of<ProfessorStudents>(context);
    final students = studentsData.items;

    return ListView.builder(
      padding: const EdgeInsets.all(10.0),
      itemCount: students.length,
      itemBuilder: (ctx, i) => ChangeNotifierProvider.value(
        value: students[i],
        child: SizedBox(
            width: MediaQuery.of(context).size.width * 0.9,
            child: ProfessorStudentCard()),
      ),
    );
  }
}
