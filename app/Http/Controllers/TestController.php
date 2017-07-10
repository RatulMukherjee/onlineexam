<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class TestController extends BaseController
{
    public function showProfile($name)
    {
       return "Your name is ".$name;
    }
	
	public function postProfile(Request $request)
	
	   //return $request->path();
	   
	   /*if($request->has('age'))	//it checks any $_POST/GET var is available or not
		    return "You are ".$request->name;
		else
			return "No name found";*/
		
		//return $request->all();	//get all parameter values
		
		//return response("dabba")->header('Access-Control-Allow-Origin','*');	//first send the response through response function and add a custom header
		
		//return response()->json(['name' => 'kumar','role' => 'Dev']); //json response
    }
}
