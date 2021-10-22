import 'package:flutter/material.dart';
import 'package:fsdm_app/models/user.dart';
import 'package:fsdm_app/widgets/my_professor_drawer.dart';
import 'package:fsdm_app/widgets/my_student_drawer.dart';
import 'package:provider/provider.dart';

class MyDrawer extends StatefulWidget {
  @override
  _MyDrawerState createState() => _MyDrawerState();
}

class _MyDrawerState extends State<MyDrawer> {
  bool isInit = true;
  bool isLoading = false;
  bool isProf;
  @override
  void didChangeDependencies() {
    if (isInit) {
      var user = Provider.of<User>(context, listen: false).user;
      if (user.isProf) {
        setState(() {
          isProf = true;
          isLoading = false;
        });
      } else {
        setState(() {
          isProf = false;
          isLoading = false;
        });
      }
      isInit = false;
    }

    // TODO: implement didChangeDependencies
    super.didChangeDependencies();
  }

  @override
  Widget build(BuildContext context) {
    return isProf ? MyProfessorDrawer() : MyStudentDrawer();
  }
}
