<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Questions;
use DB;

class TestScoreController extends BaseController
{
    public function getResult(Request $request)
    {
		
       $json = $request->json()->all();
	   $email = $json["email"];
       $answers = $json["answers"];
       $sid = $json["sid"];  	   
       $total = 0;
       
       foreach($answers as $qid => $ans){
			$an = Questions::where('qid',$qid)->get()[0]->answer;
			
			if($ans == $an)
				$total++;
	   }   
	   
	   DB::insert('insert into test_score(email,sid,exam_date,totalMarks,marksObtained) values(?,?,?,?,?)',[$email,$sid,date("Ymd"),count($answers),$total]);
	   
	   $ret = '{"error":"null","data":{"totalMarks":'.count($answers).',"marksObtained":'.$total.'}}';	
	   return $ret;
    }
}
