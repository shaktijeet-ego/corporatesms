app.controller('authCtrl', function($scope, $rootScope, $routeParams, $location, $http, Data) {
    $scope.login = {};
    $scope.signup = {};
    $scope.changepassword = {};

    $scope.sa_login = function(customer) {
        Data.post('login', {
            customer: customer
        }).then(function(results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('home');
            }
        });
    };
    $scope.signup = {
        user_email: '',
        user_password: '',
        user_name: '',
        user_phone: '',
        user_address: ''
    };
    $scope.signUp = function(customer) {
        Data.post('signUp', {
            customer: customer
        }).then(function(results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('home');
            }
        });
    };

    $scope.changePassword = function(changepassword) {
        Data.post('changepassword', {
            changepassword: changepassword
        }).then(function(results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('home');
            }
        });
    };

    $scope.logout = function() {
        Data.get('logout').then(function(results) {
            Data.toast(results);
            $location.path('login');
        });
    };


});


app.controller('sidebarController',['$scope',function($scope){
  $scope.showMenu=false;
  $scope.menuDisplay=function(){
    $scope.showMenu=!$scope.showMenu;
    $scope.showMenu=true;
    $scope.menuHide=function(){
      $scope.showMenu=!$scope.showMenu;
    }
  }
}]);


app.controller('tableController',['$scope','$http',function($scope,$http){

//function getData(){
  $http({
  method: 'get',
  url: 'files/functions/tableData.php',
  type:'json'
}).then(function successCallback(response) {

  // Store response data
  //console.log(response);
  $scope.names = response.data;
  //setTimeout(function(){
    //getData();
  //},2000)

 });


//Get User data

$http({
method: 'get',
url: 'files/functions/userdata.php',
type:'json'
}).then(function successCallback(response) {

// Store response data
//console.log(response);
$scope.usersdata = response.data;
//setTimeout(function(){
  //getData();
//},2000)

});
///User Data Get end


      $scope.displayData = function(){
           $http.get("files/functions/dashboardData.php")
           .success(function(data){
                $scope.names = data;
           });
      }


 //Delete Function
 $scope.deleteMsg=function(id){
		$http.post("files/functions/delete.php",{'id':id})
		.success(function(results){
      Data.toast(results);
				$scope.msg="Data Deletion successfull";
				//$scope.displayStud();
      })
    }

    $scope.deleteUser=function(id){
   		$http.post("files/functions/deleteuser.php",{'id':id})
   		.success(function(results){
         Data.toast(results);
   				$scope.msg="Data Deletion successfull";
   				//$scope.displayStud();
         })
       }


//Message show
 $scope.showMsg=false;
 $scope.msgDisplay=function(thisObj){
     console.log(thisObj.x);
     $http({
         method: 'get',
         url: 'files/functions/tableData.php',
         type:'json',
         params: {number: thisObj.x.name},
     }).then(function successCallback(response) {
         $scope.filternames = response.data;
         $scope.showMsg = true;
     });
 }

 $scope.send={userMobile:'',userMessage:''};
$scope.sendMessage=function(){
 $http({
   method:'POST',
   url:'files/functions/sendsms.php',
   type:'json',
   data:{
     'userMobile':$scope.send.userMobile,
     'userMessage':$scope.send.userMessage
   }
 }).then(function successCallback(data){
   if(data.error)
   {
     $scope.erroruserMobile=response.error.userMobile;
     $scope.erroruserMessage=response.error.userMessage;
   }
   else{
     $scope.send=null;
     $scope.erroruserMobile=null;
     $scope.erroruserMessage=null;
   }
 });
}


 //On click message SEND///


//getData();

////Chart

$scope.searchData = function(){
  $http({
   method:"POST",
   url:"files/functions/search.php",
   data:{search:$scope.search}
  }).success(function(data){
   $scope.names = data;
  });
 };

}]);

app.controller('individualMsgController',['$scope','$http',function($http,$scope){
  $http({
  method: 'get',
  url: 'files/functions/individualMsg.php',
  type:'json'
  }).then(function successCallback(response) {

  // Store response data
  //console.log(response);
  $scope.names = response.data;
  //setTimeout(function(){
    //getData();
  //},2000)

  });


}]);






//app.controller('sendController',['$scope','http',function($http,$scope){



//}]);
