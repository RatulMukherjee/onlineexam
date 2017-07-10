<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Info;

class InfoController extends BaseController
{
    public function get()
    {
       //$ret = Info::all();
	   $ret = Info::where('uname','kd')->take(1)->get();
	   return $ret;
    }
	
	public function insert($name){
		$info = new Info;
		$info->uname = $name;
		$info->save();
		echo "inserted";
	}
	
	public function update($uid,$uname){
		Info::where('uid',$uid)->update(['uname' => $uname]);
		echo "updated";
	}
	
	public function del($uid){
		$rows = Info::where('uid',$uid)->delete();
		echo "$rows deleted";
	}
}
