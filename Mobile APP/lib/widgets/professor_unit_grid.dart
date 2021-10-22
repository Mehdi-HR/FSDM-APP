import 'package:flutter/material.dart';
import 'package:fsdm_app/providers/professor_units_provider.dart';
import 'package:fsdm_app/widgets/professor_unit_card.dart';
import 'package:provider/provider.dart';

class ProfessorUnitGrid extends StatefulWidget {
  String code;
  ProfessorUnitGrid({this.code});

  @override
  _ProfessorUnitGridState createState() => _ProfessorUnitGridState();
}

class _ProfessorUnitGridState extends State<ProfessorUnitGrid> {
  @override
  Widget build(BuildContext context) {
    final unitsData = Provider.of<ProfessorUnits>(context);
    final units = unitsData.items;

    return ListView.builder(
      padding: const EdgeInsets.all(10.0),
      itemCount: units.length,
      itemBuilder: (ctx, i) => ChangeNotifierProvider.value(
        value: units[i],
        child: SizedBox(
            width: MediaQuery.of(context).size.width * 0.9,
            child: ProfessorUnitCard()),
      ),
    );
  }
}
