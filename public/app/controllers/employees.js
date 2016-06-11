app.controller('employeesController', function($scope, $http, API_URL){
  // Retrieve the employees
  $http.get(API_URL + "employees")
        .success(function(response){
            $scope.employees = response;
        });

  // Modal form
  $scope.toggle = function(modalstate, id){
    $scope.modalstate = modalstate;

    switch (modalstate) {
      case "add":
        $scope.form_title = "Add new employee";
        $scope.employee = {};
        break;
      case "edit":
        $scope.form_title = "Employee detail";
        $scope.id = id;
        $http.get(API_URL + "employees/" + id)
              .success(function(response){
                console.log(response);
                $scope.employee = response;
              });
        break;
      default:
        break;
    }

    console.log(id);
    $('#myModal').modal('show');
  }

  // Save new employee / updating existing
  $scope.save = function(modalstate, id){
    var url = API_URL + "employees";

    // If editing, update the url
    if (modalstate === "edit") {
      url += "/" + id;
    }

    $http({
      method: "POST",
      url: url,
      data: $.param($scope.employee),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).success(function(response){
      console.log(response);
      location.reload();
    }).error(function(response){
      console.log("ERROR");
      console.log(response);
      // alert('[ERROR] This is embarassing. An error has occured. Please check the log for details');
    });
  }

  // Delete an employee
  $scope.confirmDelete = function(id){
    var isConfirmDelete = confirm("Are you sure you want to the delete this employee");
    if (isConfirmDelete) {
      $http({
        method: "DELETE",
        url: API_URL + "employees/" + id
      }).success(function(response){
        console.log(response);
        location.reload();
      }).error(function(response){
        console.log(response);
        alert('Unable to delete the employee');
      });
    } else {
      return false;
    }
  }
});
