
	  <div class="row">
	   <div class="register-box">
	   <div class="register-box-body">
	   <div class="row center">
          <h5 class="header" style="color:#e71f23 !important; font-size:30px; ">Questions</h5>
        </div>
		<div class="row row center">
		 <div class="col-xs-12 col-md-10 col-centered">
		 <form>
		 
		 
		 <div class="row center" >
			<p><span style="font-size: 12.5pt; font-family: Arial;">&nbsp;<strong><span style="color: black;">@{{ exam_question.qNo+ ") "+exam_question.question }}</strong></span></span></p>
		</div>
		<div class="row center" >
			 <div class="radio" >
				  <label><input type="radio" ng-model="eachAnswer.answer" name="ch" value="@{{ exam_question.op1}}" >@{{ exam_question.op1 }}</label>
				  <label><input type="radio" ng-model="eachAnswer.answer" name="ch" value="@{{ exam_question.op2}}">@{{ exam_question.op2 }}</label>
				  <label><input type="radio" ng-model="eachAnswer.answer" name="ch" value="@{{ exam_question.op3}}">@{{ exam_question.op3 }}</label>
				  <label><input type="radio" ng-model="eachAnswer.answer" name="ch" value="@{{ exam_question.op4}}">@{{ exam_question.op4 }}</label>
			</div>
		</div>
		
		 <div class="row center">
			<input type="button" ng-click="showNext()" ng-hide="examRunning" value="Next" tabindex="4" class="btn btn-danger btn-flat" style="width:150px;">
			<input type="button" ng-click="finalSubmit()" ng-hide="examSubmit" value="Submit" tabindex="4" class="btn btn-danger btn-flat" style="width:150px;">
		</div>
		
		<div class="row center">
			<h4 style="color:#e71f23 !important;" ng-hide="error" ng-bind="error_message"></h4>
			<h4 style="color:#e71f23 !important;" ng-hide="success" ng-bind="success_message"></h4>
		</div>
		<form>
		 </div>
        </div>
	   </div>
	   </div>
	</div>