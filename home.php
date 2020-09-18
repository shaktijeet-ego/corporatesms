<?php
include 'header.php';
$is_admin = $_SESSION["role"] == 'admin';
?>

<div class="row rowManage" ng-controller="tableController">

<div class="col-xs-6 sideBor">

  <!---Individual Message row-->
  <div class="row rowHeight" ng-click="msgDisplay(this)" ng-repeat="x in names" >
      <div class="col-xs-4 contactName">{{x.name}}
     </div>

      <div class="col-xs-3 contactMsg">{{x.message | limitTo:60}}

      </div>

      <div class="col-xs-3 contactTime">{{x.date}}</div>
      <?php if($is_admin):?>
        <div class="col-xs-2 deleteOpt"><input type="button"   class="btn btn-primary" value="Delete" ng-click="deleteMsg(x.id);"></div>
      <?php endif;?>
    </div>
  </div>

<!--Sending panel DIV-->

<div class="col-xs-6">
  <form name="userForm" ng-submit="sendMessage()" method="post" action="">
  <div class="row borderPhone">
    <div class="col-xs-4">

<input type="tel" name="userMobile" ng-model="send.userMobile" maxlength="14" minlength="10" placeholder="Enter a number" required>
    </div>
  </div>
  <div class="row sendPanel">

    <div class="col-xs-6">
<textarea name="userMessage" ng-model="send.userMessage" placeholder="Enter a message" required></textarea>
    </div>
    <div class="col-xs-6">
<button class="buttonSize" name="send"><span>SEND</span></button>

    </div>
  </div>
  <div class="row smsMessage" ng-repeat="x in filternames">
    <div class="col-xs-12" ng-show="showMsg">
      {{x.message}}
    </div>
  </div>
  </form>
</div>

</div>




<!-----------------PHP Code For Search -------------->





<!--old code to display data in table
<table class="table table-bordered table-striped" ng-controller="tableController">
<thead>
<tr>
 <th>ID</th>
 <th>Phone</th>
 <th>Message</th>
 <th>Date</th>

</tr>
</thead>
<tbody>
<tr ng-repeat="x in names">
 <td >{{x.id}}</td>
 <td>{{x.name}}</td>
 <td>{{x.message}}</td>
 <td>{{x.date}}</td>
</tr>
</tbody>
</table>-->
