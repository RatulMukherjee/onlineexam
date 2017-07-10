<!-- ----------------------------------Main part / dynamic part --------------------------------------------------- -->
	  <div class="row">
	   <div class="register-box">
	   <div class="register-box-body">
	   <div class="row center">
          <h2 class="header" style="color:#e71f23 !important; font-size:40px; ">Login</h5>
        </div>
		<div class="row row center">
		 <div class="col-xs-12 col-md-8 col-centered">
				 <form id="#" action="#" method="post">				 
				<div class="form-group has-feedback">
					<input type="text" ng-model="login.email" tabindex="2" class="form-control" placeholder="Email" autocomplete="off" required >
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" ng-model="login.password" tabindex="1" class="form-control" placeholder="Password" autocomplete="off" required >
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				
				<div class="row">

					<!-- /.col -->
					<div class="col-xs-12 text-right" style="margin-bottom:10px;">

					</div>
				   <div class="row center">
				   <input type="button" ng-click="signUp()" name="#" value="Sign Up" id="signUp" tabindex="4" class="btn btn-danger btn-flat" style="width:150px;">
				   <input type="button" ng-click="o_login()" name="#" value="Login" id="login" tabindex="4" class="btn btn-danger btn-flat" style="width:150px;">
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
	<!-- ----------------------------------------------dynamic content end ---------------------------------- -->
    