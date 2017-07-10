<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <title>Online Exam</title>

    <!-- Bootstrap -->
    <link href="<?php  echo asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php  echo asset('css/style.css') ?>" rel="stylesheet">

  </head>
  <body>
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src=""></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<section class="parallax img-responsive">
	<div class="clear-fix">
	<p>&nbsp;</p>
	</div>
	<div class="clear-fix">
	<p>&nbsp;</p>
	</div>
	 <div class="container mgtop">
	<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 center">
            	<div class="container">
        <br><br>
		 <!--<div class="row center">
          <h2 class="header" style="color:black; font-size:50px; ">Sky Exam</h5>
        </div>-->
        <div class="row center">
          <h2 class="header" style="color:white; font-size:40px; ">Online Examination System</h5>
        </div>
		 <br><br>

        <br><br>

      </div>
            </div>
	  </section>
<!-- ----------------------------------Main part / dynamic part --------------------------------------------------- -->
	  <div ng-app="examApp" ng-controller="examController">
		<div ng-include="dynamicContent">
		</div>
	  </div>
	  
	  
<! ---------------------------dynamic content end ---------------------------------- -->
      </div>
	  </div>
	  <!-- Footer -->
	<footer style="background-color:#000000">
	<div class="container">
    <hr>
        <div class="text-center center-block">

            <br />
                <div class="container">
       <p class="text-muted" style="color:#ffffff; font-size:30px;">Online Examination </p>
       <a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a>

       </div>
      </div>
	  <hr>
		</div>

	</footer>
  <script>
	var app = angular.module("examApp",[]);
	
	app.controller("examController",function($scope,$http){
	
		$scope.dynamicContent = "html/Registration";	//default page registration
		$scope.error = true;	//hide the error div
		$scope.success = true; //hide the success div
		
		$scope.registration = {};
		$scope.registration.name = null;
		$scope.registration.email = null;
		$scope.registration.password = null;
		$scope.registration.gender = null;
		
		$scope.login = {};
		$scope.login.email = null;
		$scope.login.password = null;
		
		$scope.instructions = {};
		
		$scope.signUp = function(){
			$scope.error = true;
			$scope.success = true;
			$scope.dynamicContent = "html/Registration";
		}
		
		$scope.login = function(){
			$scope.error = true;
			$scope.success = true;
			$scope.dynamicContent = "html/login";
		}
		
		$scope.o_signUp = function(){			
			$http({
				method: "POST",
				url: "candidate/signup",
				params: $scope.registration

			  }).then(function mySuccess(response) {
				  var data = response.data;
				  
				  if(data.error == "error"){
					  $scope.success = true;
					  $scope.error_message = data.message;
					  $scope.error = false;					
				  }else{
					$scope.error = true;
					$scope.success_message = "Sucessfully registered. Please Log In.";
					$scope.success = false;
				  }
				}, function myError(response) {
				  $scope.error_message = response.statusText;
				  $scope.error = false;
			  });
		}
		
		$scope.o_login = function(){			
			$http({
				method: "POST",
				url: "candidate/login",
				params: $scope.login

			  }).then(function mySuccess(response) {
				  var data = response.data;
				  
				  if(data.error == "error"){
					  $scope.success = true;
					  $scope.error_message = data.message;
					  $scope.error = false;					
				  }else{
					$scope.error = true;
					$scope.success_message = "Test is about to start.";
					$scope.success = false;
					
					//ajax start
					$http({
						method: "GET",
						url: "candidate/subjects"
						
					  }).then(function mySuccess(response) {
						  $scope.subjects = response.data;
						  $scope.dynamicContent = "html/subjects";
						}, function myError(response) {
						  $scope.error_message = response.statusText;
						  $scope.error = false;
					  });
					//
				  }
				}, function myError(response) {
				  $scope.error_message = response.statusText;
				  $scope.error = false;
			  });
		}
		
		$scope.showInstructions = function(){
			var obj = $scope.instructions.sid;
			$scope.sid = obj;
			$scope.dynamicContent = "html/welcome";
			$scope.error = true;
			$scope.success = true;
		}
		
		$scope.exam = function(){			
			var data = {};
			data.sid = $scope.sid;
			//ajax start
					$http({
						method: "POST",
						url: "candidate/questions",
						params: data
					  }).then(function mySuccess(response) {
							$scope.examRunning = false;
							$scope.examSubmit = true;							
						    $scope.questions = response.data;
							
							$scope.answers = {};
							$scope.eachAnswer = {};
						   
						   //set the first question
						   $scope.exam_question = {};
						   $scope.exam_question.qNo = 1;
						   $scope.exam_question.qid = response.data[0].qid;
						   $scope.exam_question.question = response.data[0].question;
						   $scope.exam_question.op1 = response.data[0].op1;
						   $scope.exam_question.op2 = response.data[0].op2;
						   $scope.exam_question.op3 = response.data[0].op3;
						   $scope.exam_question.op4 = response.data[0].op4;
						   
						   if($scope.questions.length == $scope.exam_question.qNo)
						   {
								$scope.examRunning = true;
								$scope.examSubmit = false;	
						   }
						   
						   $scope.dynamicContent = "html/questions";
						}, function myError(response) {
						  $scope.error_message = response.statusText;
						  $scope.error = false;
					  }); //end
		}
		
		$scope.showNext = function(){
			$scope.eachAnswer.qid = $scope.exam_question.qid;
			
			if($scope.eachAnswer.answer == undefined)
				$scope.eachAnswer.answer = "";
			
			$scope.answers[$scope.eachAnswer.qid] = $scope.eachAnswer.answer;			
			
			var currentQuestionNo = $scope.exam_question.qNo;
			
			$scope.exam_question.qNo = currentQuestionNo + 1;
			$scope.exam_question.qid = $scope.questions[currentQuestionNo].qid;
			$scope.exam_question.question = $scope.questions[currentQuestionNo].question;
			$scope.exam_question.op1 = $scope.questions[currentQuestionNo].op1;
			$scope.exam_question.op2 = $scope.questions[currentQuestionNo].op2;
			$scope.exam_question.op3 = $scope.questions[currentQuestionNo].op3;
			$scope.exam_question.op4 = $scope.questions[currentQuestionNo].op4;
			
			if($scope.questions.length == $scope.exam_question.qNo)
			{
				$scope.examRunning = true;
				$scope.examSubmit = false;	
			}
		}
		
		$scope.finalSubmit = function(){
						
			$scope.eachAnswer.qid = $scope.exam_question.qid;
			
			if($scope.eachAnswer.answer == undefined)
				$scope.eachAnswer.answer = "";
			
			$scope.answers[$scope.eachAnswer.qid] = $scope.eachAnswer.answer;
			
			var param = {};
			param.email = $scope.login.email;
			param.sid = $scope.sid;
			param.answers = $scope.answers;
			/*$http({
				method: "POST",
				url: "candidate/test/submit",
				params: JSON.stringify(param)

			  }).then(function mySuccess(response) {
				  var data = response.data;
				  
				  if(data.error == "error"){
					  alert("error");			
				  }else{
					  alert(JSON.stringify(data));
				  }
				}, function myError(response) {
				  $scope.error_message = response.statusText;
				  $scope.error = false;
			  });*/
			  $.ajax({url: "candidate/test/submit", 
					"method":"post",
					"Content-Type":"application/json",
					"data":JSON.stringify(param),
					success: function(result){
						var obj = JSON.parse(result);
						$scope.total = obj.data.totalMarks;
						$scope.obtained = obj.data.marksObtained;
						$scope.dynamicContent = "html/result";
					}
				});
		}
	});
  </script>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php  echo asset('js/bootstrap.min.js') ?>"></script>

  </body>
</html>
