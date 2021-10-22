import 'package:flutter/material.dart';
import 'package:fsdm_app/providers/student_units.dart';
import 'package:provider/provider.dart';

import 'student_unit_card.dart';

class StudentUnitlist extends StatelessWidget {
  final units;

  const StudentUnitlist({this.units});
  @override
  Widget build(BuildContext context) {
    final unitsData = Provider.of<StudentUnits>(context);
    final units = unitsData.items;
    return ListView.builder(
      padding: const EdgeInsets.all(10.0),
      itemCount: units.length,
      itemBuilder: (ctx, i) => ChangeNotifierProvider.value(
        value: units[i],
        child: SizedBox(
          width: MediaQuery.of(context).size.width * 0.9,
          child: StudentUnitCard(),
        ),
      ),
    );
  }
}
