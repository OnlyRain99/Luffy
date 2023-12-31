<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat(){
    	$data['allData'] = FeeCategory::all();
    	return view('backend.setup.fee_category.view_fee_cat',$data);
 
    }

    public function FeeCatAdd(){
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function FeeCatStore(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);
        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }


   
}
