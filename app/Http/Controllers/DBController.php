<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;

class DBController extends BaseController
{
    public function get()
    {
       $ret = DB::select('select * from user');
	   return $ret;
    }
	
	public function insert($name){
		DB::insert('insert into user(uname) values(?)',[$name]);
		echo "inserted successfully";
	}
}
