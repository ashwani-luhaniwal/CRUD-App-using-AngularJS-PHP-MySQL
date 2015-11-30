var listApp = angular.module('listpp', ['initialValue', 'ngValidate', 'ngRoute', '720kb.datepicker']);
listApp.controller('PhoneListCtrl', function($scope, $http) {

	$scope.add_user = true;
  $scope.position = 'CEO';
  $scope.authorized = 'NO';
  // $scope.dob = '10/19/2015';

  // function to clear out all fields
  $scope.clear_fields = function() {
    $scope.full_name        =   null;
    $scope.addr_first        =  null;
    $scope.addr_second       =  null;
    $scope.addr_third    =   null;
    $scope.postcode       =  null;
    $scope.dob            =  null;
    $scope.email_addr     =  null;
    $scope.authorized = 'NO';
  }

  // validate form inputs with angular-validate plugin
  $scope.validationOptions = {

    rules: {
      full_name: "required",
      addr_first: "required",
      addr_second: "required",
      postcode: "required",
      dob: "required",
      email_addr: {
        required: true,
        email: true
      }
    },
    messages: {
      full_name: "Enter full name",
      addr_first: "Address Line 1",
      addr_second: "Address Line 2",
      postcode: "Enter valid postcode",
      dob: "Enter valid date of birth",
      email_addr: "Enter valid email address"
    }

  }

  // function to get all the user records from database
	$scope.get_users = function(){
    	$http.get("db.php?action=get_users",{
        params: { guid: $scope.guid }
      })
    	.success(function(data)
    	{ 
        	$scope.pagedItems = data;
    	});
    }
	
  // function to add new user record in database
	$scope.user_submit = function() {

    if($scope.addUserForm.validate()) {

        $http.post('db.php?action=add_user', 
            {
                'full_name'      : $scope.full_name,
                'addr_first'     : $scope.addr_first,
                'addr_second'    : $scope.addr_second,
                'addr_third'     : $scope.addr_third,
                'postcode'       : $scope.postcode,
                'dob'            : $scope.dob,
                'email_addr'     : $scope.email_addr,
                'position'       : $scope.position,
                'authorized'     : $scope.authorized,
                'guid'           : $scope.guid
            }
        )
        .success(function (data, status, headers, config) {
          // alert("User has been Submitted Successfully");
          alert(data);
          if (data == 'This User has Already been Added') {
            $scope.get_users();
          }
          else {
            $scope.get_users();
            $scope.clear_fields();
          }
        })

        .error(function(data, status, headers, config){
           
        });

    }

  }

  // function to edit user record in database
  $scope.user_edit = function(index) {  
    $scope.update_user = true;
    $scope.add_user = false;
    $http.post('db.php?action=edit_user', 
      {
        'user_index'     : index
      }
    )      
    .success(function (data, status, headers, config) {              
      $scope.id          =   data[0]["id"];
      $scope.full_name        =   data[0]["full_name"];
      $scope.addr_first        =   data[0]["addr_first"];
      $scope.addr_second       =   data[0]["addr_second"];
      $scope.addr_third    =   data[0]["addr_third"];
      $scope.postcode       =  data[0]["postcode"];
      $scope.dob            =  data[0]["dob"];
      $scope.email_addr     =  data[0]["email_addr"];
      $scope.position       =  data[0]["position"];
      $scope.authorized     =  data[0]["authorized"];
    })
    .error(function(data, status, headers, config){
           
    });
  }

    $scope.user_delete = function(index) {  
     	var x = confirm("Are you sure to delete the selected user ?");
     	if(x){
      		$http.post('db.php?action=delete_user', 
            	{
                	'user_index'     : index
            	}
        	)      
        	.success(function (data, status, headers, config) {               
             	$scope.get_users();
             	// alert("User has been deleted successfully");
        	})

        	.error(function(data, status, headers, config){
           
        	});
      	}else{

      	}
    }

    $scope.user_update = function() {

        $http.post('db.php?action=update_user', 
        	{
            	'id'            : $scope.id,
           		'full_name'     : $scope.full_name, 
            	'addr_first'     : $scope.addr_first, 
             	'addr_second'    : $scope.addr_second,
            	'addr_third' : $scope.addr_third,
              'postcode'   : $scope.postcode,
              'dob'        : $scope.dob,
              'email_addr' : $scope.email_addr,
              'position'   : $scope.position,
              'authorized' : $scope.authorized
         	}
      	)
    	.success(function (data, status, headers, config) {                 
       		$scope.get_users();
     		alert("User has been Updated Successfully");
        $scope.clear_fields();
        $scope.add_user = true;
        $scope.update_user = false;
     	})
    	.error(function(data, status, headers, config){
                   
       	});
    }

});

// directive is used to update datepicker model
listApp.directive('datepicker', function() {
  return {
    restrict: 'A',
    require: 'ngModel',
    link: function(scope, elem, attrs, ngModelCtrl) {
      var updateModel = function (dateText) {
        scope.$apply(function() {
          ngModelCtrl.$setViewValue(dateText);
        });
      };
      var options = {
        dateFormat: "dd/mm/yy",
        onSelect: function(dateText) {
          updateModel(dateText);
        }
      };
      elem.datepicker(options);
    }
  }
});