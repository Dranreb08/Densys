<div class="tab-pane fade in active" id="1a">
  <div class="panel panel-default">
      <div class="panel-heading">
        
      </div>

      <div class="panel-body">
          <!-- Display Validation Errors -->
          @include('common.errors')
          @if(session('status'))
            <div class="alert alert-success">
              {{session('status')}}
            </div>
          @endif
          <!-- New Patient Form -->
          <form action="{{ url('patient') }}" method="POST" class="form-horizontal"  name = "userForm" novalidate>
              {{ csrf_field() }}

              <!-- Patient Name -->
              <div class="form-group" ng-class="{ 'has-error has-feedback' : userForm.surname.$invalid && !userForm.surname.$pristine }">
                  <!-- <div >
                     <p>Enter your Name: <input type = "text" ng-model = "name"></p>
                     <p>Hello @{{sample.first_name}}!</p>
                  </div> -->
                <label for="patient-surname" class="col-sm-3 control-label">Surname</label>
                <div class="col-sm-6">
                  <input ng-model = "surname" type="text" name="surname" id="patient-surname" class="form-control" required>
                  <span class="glyphicon glyphicon-remove form-control-feedback" ng-show="userForm.surname.$invalid && !userForm.surname.$pristine" ></span>
                  <p ng-show="userForm.surname.$invalid && !userForm.surname.$pristine" class="help-block">This field is required.</p>
                </div>
                
              </div>
              <div class="form-group">
                  <label for="patient-first_name" class="col-sm-3 control-label">First Name</label>

                  <div class="col-sm-6">
                      <input ng-model = "first_name" type="text" name="first_name" id="patient-first_name" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <label for="patient-middle_name" class="col-sm-3 control-label">Middle Name</label>

                  <div class="col-sm-6">
                      <input type="text" name="middle_name" id="patient-middle_name" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <label for="patient-age" class="col-sm-3 control-label">Age</label>

                  <div class="col-sm-6">
                      <input type="text" name="age" id="patient-age" class="form-control">
                  </div>
              </div>
             <div class="form-group">
                <label for="patient-birthdate" class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-6">
                  <select class="form-control" id="patient-birthdate" name="gender" >
                    <option default>Select gender..</option>
                    <option value="1" >Male</option>
                    <option value="2" >Female</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="patient-birthdate" class="col-sm-3 control-label">Birthdate</label>

                  <div class="col-sm-6">
                      <input type="text" name="birthdate" id="patient-birthdate" class="form-control" placeholder="1900-01-01">
                  </div>
              </div>
              <div class="form-group">
                <label for="patient-civil_status" class="col-sm-3 control-label">Civil Status</label>
                <div class="col-sm-6">
                  <select class="form-control" id="patient-civil_status" name="civil_status">
                    <option default>Select civil status..</option>
                    <option value="Single" >Single</option>
                    <option value="Married" >Married</option>
                    <option value="Widowed" >Widowed</option>
                    <option value="Separated" >Separated</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="patient-address" class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-6">
                      <input type="text" name="address" id="patient-address" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                  <label for="patient-cp_no" class="col-sm-3 control-label">Mobile No.</label>

                  <div class="col-sm-6">
                      <input type="text" name="cp_no" id="patient-cp_no" class="form-control" placeholder="09xx-xxx-xxxx">
                  </div>
              </div>
              <div class="form-group">
                  <label for="patient-tel_no" class="col-sm-3 control-label">Tel. No.</label>

                  <div class="col-sm-6">
                      <input type="text" name="tel_no" id="patient-tel_no" class="form-control" placeholder="888-8888">
                  </div>
              </div>
              <div class="form-group">
                  <label for="patient-email_address" class="col-sm-3 control-label">E-mail Address</label>

                  <div class="col-sm-6">
                      <input type="email" name="email_address" id="patient-email_address" class="form-control" placeholder="sample@gmail.com" >
                  </div>
              </div>

              <!-- Add Patient Button -->
              <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                      <button type="submit" class="btn btn-default">
                          <i class="fa fa-btn fa-plus"></i> Add Patient
                      </button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>