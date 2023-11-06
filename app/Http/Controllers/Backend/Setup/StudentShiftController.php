<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift',$data);
    }

    public function StudentShiftAdd(){
        return view('backend.setup.shift.add_shift');
    }

    public function StudentShiftStore(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:student_shifts,name',
    		
    	]);

    	$data = new StudentShift();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student Shift Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.shift.view')->with($notification);

    }
}
