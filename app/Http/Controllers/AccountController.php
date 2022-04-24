<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Tool;
use App\Models\Condition;



class AccountController extends Controller
{


    public function formValidation()
    {
    	return view('form-validation');
    }


    public function formValidationPost(Request $request)
    {
    	$this->validate($request,[
    			'toolname' => 'required',
    			'toolcategory' => 'required',
    			'toolcondition' => 'required',
    			'tooltype' => 'required'
    		],
            [
    			'toolname.required' => ' The tool name field is required.',
    			'toolcategory.required' => ' The tool category field is required. ',
    			'toolcondition.required' => ' The tool condition field is required.',
                'tooltype.required' => ' The tool type field is required. '
    		]);


    	dd('You have successfully added all tools for rent.');
    }
}
