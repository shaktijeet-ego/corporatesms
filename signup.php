<div class="container">
  <div class="loginback">
    <div class="panel panel-default">
      <div class="heading">
       <h3 class="panel-title">Corporate SMS Sign Up</h3>
     </div>
        <div class="panel-body">
            <form name="signupForm" class="form-horizontal" role="form">
                <div class="form-group">
                    <input type="text" id="display_name" class="form-control input-lg" placeholder="Name" ng-model="signup.user_name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="Phone" name="user_phone" ng-model="signup.user_phone"
                    maxlength>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="Address" ng-model="signup.user_address">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control input-lg" placeholder="Email" name="user_email" ng-model="signup.user_email" focus>
                    <span ng-show="signupForm.user_email.$error.user_email" class="help-inline">Invalid email address</span>
                </div>
                <div class="form-group">
                            <input type="password" class="form-control input-lg" name="user_password" placeholder="Password" ng-model="signup.user_password" required>
                            <span class="errorMessage" data-ng-show="signupForm.user_password.$dirty && signupForm.user_password.$invalid"> Enter Password.</span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" name="confPassword" placeholder="Password Again" ng-model="signup.confPassword" password-match="signup.user_password" required>
                            <span class="errorMessage" data-ng-show="signupForm.confPassword.$dirty && signupForm.confPassword.$error.required">Enter confirm password</span>

                            <span style="color:#F00" class="errorMessage" data-ng-show="signupForm.confPassword.$dirty && signupForm.confPassword.$error.passwordNoMatch && !signupForm.confPassword.$error.required">Passwords do not match, please retype..</span>
                        </div>


                <div class="form-group">
                    <!-- <a href="#/login" class="btn btn-success btn-block btn-lg">Log In</a> -->
                    <a href="#/dashboard" class="btn btn-success btn-block btn-lg">Dashboard</a>
                        <button type="submit" class="btn btn-primary btn-block btn-lg" ng-click="signUp(signup)" >Sign Up
                        </button>
                    </div>

            </form>
        </div>
    </div>
  </div>
  </div>
