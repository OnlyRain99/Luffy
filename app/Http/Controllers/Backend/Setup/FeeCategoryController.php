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


   
}
