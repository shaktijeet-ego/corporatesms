<?php


?>
<div class="container">
  <div class="loginback">
  <div class="panel panel-default">
  <div class="heading">

                 <h3 class="panel-title"><a href="guide.php" class="btn btn-lg btn-primary btn-block">Guide</a></h3><br>
    <h3 class="panel-title">Corporate SMS Login</h3>
  </div>
          <div class="panel-body">
            <form role="form">

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email or Phone" name="user_email" ng-model="login.user_email" required focus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" ng-model="login.user_password" required>
                    </div>
                  <div class="form-group" align="center">
                            <!-- <a href="#/signup" class="btn btn-lg btn-primary btn-block">Sign Up</a> -->
                            <button type="submit" class="btn btn-lg btn-success btn-block" ng-click="sa_login(login)" data-ng-disabled="login_app.$invalid">Log In</button>
                    </div>
            </form>
          </div>
        </div>
    </div>
  </div>
