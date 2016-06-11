<!DOCTYPE html>
<html lang="es-US" ng-app="employeeRecords">
  <head>
    <meta charset="utf-8">
    <title>Laravel + AngularJS example</title>
    <!-- Load Bootstrap styles -->
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
  </head>
  <body>
    <h2>Employee Database</h2>
    <div class="" ng-controller="employeesController">
      <!-- Table to load the data -->
      <table class="table">
        <thead>
          <tr>
            <th>
              ID
            </th>
            <th>
              Name
            </th>
            <th>
              E-mail
            </th>
            <th>
              Contact No.
            </th>
            <th>
              Position
            </th>
            <th>
              <button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">
                Add New Employee
              </button>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="employee in employees">
            <td>
              {{ employee.id}}
            </td>
            <td>
              {{ employee.name}}
            </td>
            <td>
              {{ employee.email}}
            </td>
            <td>
              {{ employee.contact_number}}
            </td>
            <td>
              {{ employee.position}}
            </td>
            <td>
              <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', employee.id)">
                Edit
              </button>
              <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(employee.id)">
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- End of table -->
      <!-- Modal with the employee detail -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" name="frmEmployees" novalidate="">

                <div class="form-group error">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="name" id="name" class="form-control has-error" placeholder="Fullname" value="{{name}}"
                      ng-model="employee.name" ng-required="true"/>
                      <span class="help-inline" ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">
                        Valid Name field is required
                      </span>
                  </div>
                </div>

                <div class="form-group error">
                  <label for="inputEmail3" class="col-sm-3 control-label">E-mail</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" id="email" class="form-control has-error" placeholder="Email Address"
                      value="{{email}}" ng-model="employee.email" ng-required="true"/>
                      <span class="help-inline" ng-show="frmEmployees.email.$invalid && frmEmployees.email.$touched">
                        Valid E-mail field is required
                      </span>
                  </div>
                </div>

                <div class="form-group error">
                  <label for="inputEmail3" class="col-sm-3 control-label">Contact Number</label>
                  <div class="col-sm-9">
                    <input type="text" name="contact_number" id="contact_number" class="form-control has-error"
                      placeholder="Contact Number" value="{{contact_number}}" ng-model="employee.contact_number"
                      ng-required="true"/>
                      <span class="help-inline" ng-show="frmEmployees.contact_number.$invalid && frmEmployees.contact_number.$touched">
                        Contact Number field is required
                      </span>
                  </div>
                </div>


                <div class="form-group error">
                  <label for="inputEmail3" class="col-sm-3 control-label">Position</label>
                  <div class="col-sm-9">
                    <input type="text" name="position" id="position" class="form-control has-error"
                      placeholder="Position" value="{{position}}" ng-model="employee.position"
                      ng-required="true"/>
                      <span class="help-inline" ng-show="frmEmployees.position.$invalid && frmEmployees.position.$touched">
                        Position field is required
                      </span>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" name="button" class="btn btn-primary" id="btn-save"
                  ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">
                Save changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>

    <!-- AngularJS Application Scripts -->
    <script src="<?= asset('app/app.js') ?>"></script>
    <script src="<?= asset('app/controllers/employees.js') ?>"></script>
  </body>
</html>
