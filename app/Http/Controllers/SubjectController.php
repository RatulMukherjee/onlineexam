<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;

class SubjectController extends BaseController
{
    public function getAll()
    {
       $ret = DB::select('select * from subject');
	   return $ret;
    }
}
