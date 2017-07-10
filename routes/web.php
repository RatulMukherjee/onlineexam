<?php

//return login view page
Route::get('exam/candidate',function(){
	//return File::get(public_path() . '\\main.html');
	return view("main");	//blade.php
});

//return html file
Route::get('exam/html/{filename}',function($filename){
	return view($filename);
});

//return test view page
Route::get('exam/candidate/test',function(){
	return "Page is under construction";
});

//login success or failure
Route::post('exam/candidate/login','CandidateController@login');

//registration
Route::post('exam/candidate/signup','CandidateController@signup');

//get all the subjects
Route::get('exam/candidate/subjects','SubjectController@getAll');

//get questions subject wise
Route::post('exam/candidate/questions','QuestionsController@getQuestions');

//submit test and get result
Route::post('exam/candidate/test/submit','TestScoreController@getResult');

//return admin login view page
Route::get('exam/admin/login',function(){
	return "Page is under construction";
});

//return admin dashboard view page
Route::get('exam/candidate/dashboard',function(){
	return "Page is under construction";
});

//admin add questions
Route::post('exam/admin/questions','AdminController@createQuestion');

//admin add subjects
Route::post('exam/admin/subjects','AdminController@createSubject');
