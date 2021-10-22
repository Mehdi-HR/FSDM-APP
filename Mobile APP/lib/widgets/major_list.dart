import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'package:fsdm_app/providers/studentsOfMajor.dart';
import 'package:fsdm_app/widgets/student_major_card.dart';

class MajorList extends StatefulWidget {
  @override
  MajorListState createState() => MajorListState();
}

class MajorListState extends State<MajorList> {
  @override
  Widget build(BuildContext context) {
    final unitsData = Provider.of<StudentsOfMajor>(context);
    final units = unitsData.items;

    return ListView.builder(
      padding: const EdgeInsets.all(10.0),
      itemCount: units.length,
      itemBuilder: (ctx, i) => ChangeNotifierProvider.value(
        value: units[i],
        child: SizedBox(
            width: MediaQuery.of(context).size.width * 0.9,
            child: StudentMajorCard()),
      ),
    );
  }
}
