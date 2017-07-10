<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use App\Questions;

class QuestionsController extends BaseController
{
    public function getQuestions(Request $request)
    {
		$sid = $request->sid;
       $ret = Questions::where('sid',$sid)->get();
	   return $ret;
    }
}
