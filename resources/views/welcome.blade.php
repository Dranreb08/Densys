@extends('layouts.app')

@section('content')
<<style>
.form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                
                <div class="panel-body">
                    Your Application's Landing Page.
                        <ul class="nav nav-tabs">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Menu 1</a></li>
      <li><a href="#">Menu 2</a></li>
      <li><a href="#">Menu 3</a></li>
    </ul>
  <form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="col-sm-2 control-label">Focused</label>
    <div class="col-sm-10">
      <input class="form-control" id="focusedInput" type="text" value="Click to focus">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Disabled</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" disabled>
    </div>
  </div>
  <fieldset disabled>
    <div class="form-group">
      <label for="disabledTextInput" class="col-sm-2 control-label">Fieldset disabled</label>
      <div class="col-sm-10">
        <input type="text" id="disabledTextInput" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="disabledSelect" class="col-sm-2 control-label"></label>
      <div class="col-sm-10">
        <select id="disabledSelect" class="form-control">
          <option>Disabled select</option>
        </select>
      </div>
    </div>
  </fieldset>
  <div class="form-group has-success has-feedback">
    <label class="col-sm-2 control-label" for="inputSuccess">
    Input with success and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputSuccess">
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div>
  </div>
  <div class="form-group has-warning has-feedback">
    <label class="col-sm-2 control-label" for="inputWarning">
    Input with warning and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputWarning">
      <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
    </div>
  </div>
  <div class="form-group has-error has-feedback">
    <label class="col-sm-2 control-label" for="inputError">
    Input with error and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputError">
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
    </div>
  </div>
</form><form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="col-sm-2 control-label">Focused</label>
    <div class="col-sm-10">
      <input class="form-control" id="focusedInput" type="text" value="Click to focus">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Disabled</label>
    <div class="col-sm-10">
      <input class="form-control" id="disabledInput" type="text" disabled>
    </div>
  </div>
  <fieldset disabled>
    <div class="form-group">
      <label for="disabledTextInput" class="col-sm-2 control-label">Fieldset disabled</label>
      <div class="col-sm-10">
        <input type="text" id="disabledTextInput" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="disabledSelect" class="col-sm-2 control-label"></label>
      <div class="col-sm-10">
        <select id="disabledSelect" class="form-control">
          <option>Disabled select</option>
        </select>
      </div>
    </div>
  </fieldset>
  <div class="form-group has-success has-feedback">
    <label class="col-sm-2 control-label" for="inputSuccess">
    Input with success and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputSuccess">
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div>
  </div>
  <div class="form-group has-warning has-feedback">
    <label class="col-sm-2 control-label" for="inputWarning">
    Input with warning and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputWarning">
      <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
    </div>
  </div>
  <div class="form-group has-error has-feedback">
    <label class="col-sm-2 control-label" for="inputError">
    Input with error and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputError">
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
    </div>
  </div>
</form>
<form class="form-inline" role="form">
  <div class="form-group">
    <label for="focusedInput">Focused</label>
    <input class="form-control" id="focusedInput" type="text">
  </div>
  <div class="form-group">
    <label for="inputPassword">Disabled</label>
    <input class="form-control" id="disabledInput" type="text" disabled>
  </div>
  <div class="form-group has-success has-feedback">
    <label for="inputSuccess2">Input with success</label>
    <input type="text" class="form-control" id="inputSuccess2">
    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
  </div>
  <div class="form-group has-warning has-feedback">
    <label for="inputWarning2">Input with warning</label>
    <input type="text" class="form-control" id="inputWarning2">
    <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
  </div>
  <div class="form-group has-error has-feedback">
    <label for="inputError2">Input with error</label>
    <input type="text" class="form-control" id="inputError2">
    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
  </div>
</form>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
  <span class="help-block">This is some help text...</span>
</div>

                </div>
            </div>
        </div>
    </div>
   
    <div class="[ col-xs-12 col-sm-6 ]">
        <h3>Standard Checkboxes</h3><hr />
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                    Default Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-primary" id="fancy-checkbox-primary" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-primary" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-primary" class="[ btn btn-default active ]">
                    Primary Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-success" id="fancy-checkbox-success" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success" class="[ btn btn-default active ]">
                    Success Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-info" id="fancy-checkbox-info" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-info" class="[ btn btn-info ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-info" class="[ btn btn-default active ]">
                    Info Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-warning" id="fancy-checkbox-warning" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-warning" class="[ btn btn-warning ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-warning" class="[ btn btn-default active ]">
                    Warning Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-danger" id="fancy-checkbox-danger" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-danger" class="[ btn btn-danger ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-danger" class="[ btn btn-default active ]">
                    Danger Checkbox
                </label>
            </div>
        </div>
    </div>

    <div class="[ col-xs-12 col-sm-6 ]">
        <h3>Custom Icons Checkboxes</h3><hr />
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-default-custom-icons" id="fancy-checkbox-default-custom-icons" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default-custom-icons" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-plus ]"></span>
                    <span class="[ glyphicon glyphicon-minus ]"></span>
                </label>
                <label for="fancy-checkbox-default-custom-icons" class="[ btn btn-default active ]">
                    Default Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-primary-custom-icons" id="fancy-checkbox-primary-custom-icons" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-primary-custom-icons" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-plus ]"></span>
                    <span class="[ glyphicon glyphicon-minus ]"></span>
                </label>
                <label for="fancy-checkbox-primary-custom-icons" class="[ btn btn-default active ]">
                    Primary Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-success-custom-icons" id="fancy-checkbox-success-custom-icons" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-success-custom-icons" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-plus ]"></span>
                    <span class="[ glyphicon glyphicon-minus ]"></span>
                </label>
                <label for="fancy-checkbox-success-custom-icons" class="[ btn btn-default active ]">
                    Success Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-info-custom-icons" id="fancy-checkbox-info-custom-icons" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-info-custom-icons" class="[ btn btn-info ]">
                    <span class="[ glyphicon glyphicon-plus ]"></span>
                    <span class="[ glyphicon glyphicon-minus ]"></span>
                </label>
                <label for="fancy-checkbox-info-custom-icons" class="[ btn btn-default active ]">
                    Info Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-warning-custom-icons" id="fancy-checkbox-warning-custom-icons" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-warning-custom-icons" class="[ btn btn-warning ]">
                    <span class="[ glyphicon glyphicon-plus ]"></span>
                    <span class="[ glyphicon glyphicon-minus ]"></span>
                </label>
                <label for="fancy-checkbox-warning-custom-icons" class="[ btn btn-default active ]">
                    Warning Checkbox
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-danger-custom-icons" id="fancy-checkbox-danger-custom-icons" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-danger-custom-icons" class="[ btn btn-danger ]">
                    <span class="[ glyphicon glyphicon-plus ]"></span>
                    <span class="[ glyphicon glyphicon-minus ]"></span>
                </label>
                <label for="fancy-checkbox-danger-custom-icons" class="[ btn btn-default active ]">
                    Danger Checkbox
                </label>
            </div>
        </div>
    </div>
</div>

@endsection
