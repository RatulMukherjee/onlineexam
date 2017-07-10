<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use App\Candidate;

class CandidateController extends BaseController
{
    public function login(Request $request)
    {
       $email = $request->email;
	   $password = $request->password;
	   
       $cand = Candidate::where('email',$email)->get();
       $pass = $cand[0]->password;
       
       if($password == $pass)
		return "{\"error\":\"null\",\"data\":\"success\"}";
	   else
		return "{\"error\":\"error\",\"message\":\"Wrong credentials\"}";
    }
	
	public function signup(Request $request){
		$name = $request->name;
		$email = $request->email;
		$gender = $request->gender;
		$password = $request->password;
		
		try{
			if($this->emailExists($email))
				return "{\"error\":\"error\",\"message\":\"Email already exists\"}";
				
			DB::insert('insert into candidate(email,name,gender,password) values(?,?,?,?)',[$email,$name,$gender,$password]);
			return "{\"error\":\"null\",\"data\":\"success\"}";
		}catch(Exception $e){
			return "{\"error\":\"error\",\"message\":\"Error\"}";
		}
	}
	
	private function emailExists($email){
		$ret = Candidate::where('email',$email)->get()->count();
		
		if($ret >= 1)
			return true;
		else
			return false;
	}
}
