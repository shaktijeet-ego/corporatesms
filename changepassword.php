<?php
include 'header.php';
?>

<div class="container">
  <div class="loginback">
  <div class="panel panel-default">
  <div class="heading">

    <h3 class="panel-title">Change Password</h3>
  </div>
          <div class="panel-body">
            <form role="form">

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Current Password" name="old_password" ng-model="changepassword.oldpassword" required focus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="New Password" name="new_password" ng-model="changepassword.newpassword" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" ng-model="changepassword.confirmpassword"required>
                    </div>
                  <div class="form-group" align="center">
                            <!-- <a href="#/signup" class="btn btn-lg btn-primary btn-block">Sign Up</a> -->
                            <button type="submit" class="btn btn-lg btn-success btn-block" ng-click="changePassword(changepassword)" data-ng-disabled="changepassword.$mismatch">Change Password</button>
                    </div>
            </form>
          </div>
        </div>
    </div>
  </div>
