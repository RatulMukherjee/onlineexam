	  <div class="container">
	  <div class="row">
	   <div class="register-box">
	   <div class="register-box-body">
	   <div class="row center">
          <h2 class="header" style="color:#e71f23 !important; font-size:40px; ">Register</h2>
        </div>
		<div class="row row center">
		 <div class="col-xs-12 col-md-8 col-centered">
				 <form>
				 <div class="form-group has-feedback">
					<input type="text" ng-model="registration.name" tabindex="1" class="form-control" placeholder="Name" autocomplete="off" required >
					<span class="glyphicon glyphicon-user form-control-feedback" ></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" ng-model="registration.email" tabindex="2" class="form-control" placeholder="Email" autocomplete="off" required >
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback" style="margin-bottom:5px;">
					<input type="password" ng-model="registration.password" maxlength="10" tabindex="3" class="form-control" placeholder="Password" autocomplete="off" required>
					 <span class="glyphicon glyphicon-phone form-control-feedback"></span>
				</div>
				<div class="radio form-group has-feedback center" style="margin-bottom:5px;">
				  <label><input type="radio" ng-model="registration.gender" value="male">Male</label>
				  <label><input type="radio" ng-model="registration.gender" value="female">Female</label>
				</div>

				<div class="row">
				
					<!-- /.col -->
					<div class="col-xs-12 text-right" style="margin-bottom:10px;">

					</div>
				   <div class="row center">
				   <input type="button" ng-click="o_signUp()" name="#" value="Sign Up" id="signUp" tabindex="4" class="btn btn-danger btn-flat" style="width:150px;">
				   <input type="button" ng-click="login()" name="#" value="Login" id="login" tabindex="4" class="btn btn-danger btn-flat" style="width:150px;">
				  </div>
				  
				  <div class="row center">
					  <h4 style="color:#e71f23 !important;" ng-hide="error" ng-bind="error_message"></h4>
					  <h4 style="color:#e71f23 !important;" ng-hide="success" ng-bind="success_message"></h4>
				</div>

					<!-- /.col -->
				</div>
				</form>
		 </div>
        </div>
	   </div>
	   </div>


				  </div>				  
				  </div>