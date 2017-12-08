@extends('layouts.default')

{{-- Page title --}}
@section('title')
   Users
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" media="all" href="{{ asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Change Password</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    Change Password
                </a>
            </li>
        </ol>
    </section>

    <section class="content">

	  <div style="padding:10px">
	 
		   <form class="form-horizontal"  name="frm-designation" method="POST" action="{{url('update/password')}}" autocomplete="off" >
	       
		   {{ csrf_field() }}
              <div class="box-body">
			  
								
			
				
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Current Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name= "cpassword" value="" id="cpassword"  placeholder="****">
					 @if ($errors->has('cpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpassword') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name= "password" value="" id="password"  placeholder="****">
					 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
			    <div class="form-group">
                 <div  class="col-sm-2 cols-offset-2"></div>
                  <div  class="col-sm-8 cols-offset-2">
				  <button type="submit" class="btn btn-primary btn-flat" id="submit" name="submit">Save</button>
				  &nbsp;  &nbsp;
				   <a type="reset" class="btn btn-danger  btn-flat"  href="{{url('/user')}}">Cancel</a>
				  </div>

                
                </div>
	
				</div>
				</form>
				
      </div>        
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
 
    <script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>

@stop