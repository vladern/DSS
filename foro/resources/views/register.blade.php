@extends('layouts.master')

@section('content')
<div class="container" style="margin-top:30px">
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong>Sign in </strong></h3>
      <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Already have an account !!</a></div>
  </div>
  
  <div class="panel-body">
   <form role="form">
   <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
            </div>
            <div class="row">


          <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1">
          </div>
        </div>


        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name" tabindex="2">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control " placeholder="Display Name" tabindex="3">
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4">
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="5">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
          </div>
        </div>
      </div>
                                    
                                  
                                    
  <button type="button" class="btn btn-primary btn-block">Sign Up</button>
  
</form>
  </div>
</div>
</div>
</div>
@endsection