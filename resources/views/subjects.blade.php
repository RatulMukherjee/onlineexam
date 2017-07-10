
	  <div class="row">
	   <div class="register-box">
	   <div class="register-box-body">
	   <div class="row center">
          <h4 class="header" style="color:#e71f23 !important; font-size:30px; ">Choose the Subject</h4>
        </div>
		<div class="row row center">
		 <div class="col-xs-12 col-md-10 col-centered">
		 <form>
		 <div class="row center" >
			 <div class="radio" ng-repeat="sub in subjects">
				  <label><input type="radio" ng-model="instructions.sid" name="ch" value="@{{ sub.sid}}" selected>@{{ sub.sName | uppercase }}</label>
			</div>
		</div>
		 <div class="row center">
			<input type="button" ng-click="showInstructions()" value="Get Instructions" tabindex="4" class="btn btn-danger btn-flat" style="width:150px;">
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