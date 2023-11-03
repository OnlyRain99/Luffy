<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroup(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group',$data);
    }

    public function StudentGroupAdd(){
        return view('backend.setup.group.add_group');
    }

    public function StudentGroupStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
}
