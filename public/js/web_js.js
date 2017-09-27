var app = angular.module("myApp", []);
// app.config(function($routeProvider) {
//     $routeProvider
//     .when("/patients", {
//         templateUrl : "patients",
//         controller : "patientController"
//     })
//     .when("/nol", {
//         templateUrl : "patients",
//         controller : "patientController"
//     })
//     .when("/paris", {
//         templateUrl : "paris.htm",
//         controller : "parisCtrl"
//     });
// });
app.directive('loading', function () {
    return {
      restrict: 'E',
      replace:true,
      template: '<i class="fa fa-spinner fa-spin" style="padding: 3px;"></i>',
      link: function (scope, element, attr) {
            scope.$watch('loading', function (val) {
                if (val){
                    $(".glyphicon-search").hide();
                    $( ".fa-sign-in" ).hide();
                    $(element).show();
                }
                else{
                    $(".glyphicon-search").show();
                    $( ".fa-sign-in" ).show();
                    $(element).hide();
                }
            });
      }
    }
})
app.controller("patientController", function ($timeout, $scope,$http) {
  $scope.list = {};
  $scope.sample = '';
  $scope.message = '';
  $scope.patient = {};
  $scope.button = {"verb":"POST","text":"SAVE"};
  $scope.genders =  [{
                        'id': '1',
                        'value': 'Male'
                    }, 
                    {
                        'id': '2',
                        'value': 'Female'
                    }];
 $scope.civil_status =  [{
                        'id': 'Single',
                        'value': 'Single'
                    }, 
                    {
                        'id': 'Married',
                        'value': 'Married'
                    }];
/*Patient search functions*/
  $scope.submit = function() {
    //   alert();
    // $scope.patient.patient_id = '';
    // $scope.patient.surname = '';
    // $scope.patient.first_name = '';
    // $scope.patient.middle_name = '';
    // $scope.patient.age = '';
    // $scope.patient.gender = '';
    // // $scope.patient.birthdate = '';
    // // $scope.patient.civil_status = '';
    // // $scope.patient.address = '';
    // $scope.patient.cp_no = '';
    // $scope.patient.tel_no = '';
    // $scope.patient.email_address = '';
    $scope.patient.info = {};
    $scope.patient.consultation = {};
    $scope.patient.dental_history = {};
    $scope.patient.medical_history = {};
    $scope.button = {"verb":"POST","text":"SAVE"};
    if ($scope.text) {
        $scope.loading = true;
        $http({
            method : "GET",
            url : "patient/search/"+$scope.text,
        }).then(function mySuccess(response) {
            console.log(response.data);
          
            $scope.list = response.data;
            $scope.loading = false;
        }, function myError(response) {
            alert(response.statusText);
        });
        $scope.list;
    }
  };
  $scope.selectedPx = function(data) {
    px_id = parseInt(data);
    $scope.patient.dental_history = {};
    $scope.patient.medical_history = {};
    $scope.button.verb = 'PATCH';
    $scope.button.text = 'UPDATE';
    $scope.patient.info.patient_id = $scope.list[px_id].id;
    $scope.patient.info.surname = $scope.list[px_id].surname;
    $scope.patient.info.first_name = $scope.list[px_id].first_name;
    $scope.patient.info.middle_name = $scope.list[px_id].middle_name;
    $scope.patient.info.gender = $scope.list[px_id].gender;
    $scope.patient.info.age = $scope.list[px_id].age;
    $scope.patient.info.cp_no = $scope.list[px_id].cp_no;
    $scope.patient.info.tel_no = $scope.list[px_id].tel_no;
    $scope.patient.info.email_address = $scope.list[px_id].email_address;
    
    $scope.patient.consultation.chief_complaint=$scope.list[px_id]['consultations'][0].dental_compaint_id;
    $scope.patient.consultation.last_dental_check=$scope.list[px_id]['consultations'][0].date_time;
    $.each($scope.list[px_id]['patient_dental_histories'], function(pdh_id, pdh_val){
        dental_history_id = pdh_val.dental_history_id;
        $scope.patient.dental_history[dental_history_id] = true;
    });
    $.each($scope.list[px_id]['patient_medical_histories'], function(pmh_id, pmh_val){
        medical_history_id = pmh_val.medical_history_id;
        $scope.patient.medical_history[medical_history_id] = true;
    });
  };
  $scope.clickselectedPX = function(pid) {
      px_id = parseInt(pid);
      $timeout(function() {
          var px_element = $("#"+px_id);
          angular.element(px_element).triggerHandler('click');
      }, 0);
  };
/*End of Patient search functions*/
    $scope.save_patient = function() {
        $scope.loading = true;
        $http({
            method : $scope.button.verb,
            url : "patient",
            headers: {
                // 'Content-Type': JSON,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data : {data: $scope.patient.info }
        }).then(function mySuccess(response) {
            $scope.button.verb = 'PATCH';
            $scope.button.text = 'UPDATE';
            console.log(response.data);
            $scope.patient.patient_id = response.data.patient_id;
            $scope.loading = false;
        }, function myError(response) {
            console.log("Error saving patient!");
        });
    };
  $scope.patient_histories = function() {

        parseInt($scope.patient.info.patient_id);
        $scope.loading = true;
        $http({
            method : $scope.button.verb,
            url : "dental_history"+($scope.button.text == 'UPDATE'?"/"+$scope.patient.info.patient_id:""),
            headers: {
                // 'Content-Type': JSON,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data : {data: $scope.patient }
        }).then(function mySuccess(response) {
            $scope.button.verb = 'PATCH';
            $scope.button.text = 'UPDATE';
            $scope.loading = false;
            console.log("patient histories has been submitted!");
        }, function myError(response) {
            console.log("Error submitting patient histories!");
        });
  };
  
});



 
$(document).ready(function(){
    
  $("#searchForm input").focus();
    document.onkeydown = function (e) {
        switch (e.keyCode) {
        case 38:
            moveUp();
        break;
        case 40:
            moveDown();
        break;
    }
};

function moveUp() {
  //If nothing selected
  if($(".selected").length==0){
      $("#start-result").addClass("selected").focus();
  }
  
  //Check if there is another link above, if no, go to bottom
  if ($(".selected").prev("a").length > 0) {
      $(".selected").removeClass("selected").prev("a").addClass("selected").focus();
      $("#searchForm input").val($(".selected").text());
  } else {
      $(".selected").removeClass("selected");
      $("#divSearchResults a:last-child").addClass("selected").focus();
      $("#searchForm input").val($(".selected").text());
  }
  angular.element('#search-panel').scope().clickselectedPX($(".selected").attr('id'));
}

function moveDown() {
  //If nothing selected
  if($(".selected").length==0){
      $("#start-result").addClass("selected").focus();
  }
  //Check if there is another link under, if no, go to top
  if ($(".selected").next("a").length > 0) {
      $(".selected").removeClass("selected").next("a").addClass("selected").focus();
      // console.log($(".selected").text());
      $("#searchForm input").val($(".selected").text());
  } else {
      $(".selected").removeClass("selected");
      $("#divSearchResults span").next().addClass("selected").focus();
      // console.log($(".selected").text());
      $("#searchForm input").val($(".selected").text());
  }
  angular.element('#search-panel').scope().clickselectedPX($(".selected").attr('id'));
}
//Remove .selected style on click outside
// $(document).on("blur", ".selected", function () {
//     $(this).removeClass("selected");
// });
  });

    
