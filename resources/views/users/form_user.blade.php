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
        <h1>{{$title}} User</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    {{$title}} user
                </a>
            </li>
        </ol>
    </section>

    <section class="content">

	  <div style="padding:10px">
	  @if($title=='Add')
         <form class="form-horizontal"  name="frm-designation" method="POST" action="{{url('add/user')}}" autocomplete="off" >
	  @else
		   <form class="form-horizontal"  name="frm-designation" method="POST" action="{{url('update/user')}}" autocomplete="off" >
	        <input type="hidden" name="user_id" value="{{$user->id}}">
	  @endif
		   {{ csrf_field() }}
              <div class="box-body">
			   
				<div class="form-group">
                  <label for="fname" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "name" value="{{$user->name or ''}}" id="name"  placeholder="Name">
					 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
								
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name= "email" value="{{$user->email or ''}}" id="email"  placeholder="e.g demo@example.com">
					 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Password</label>

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
                  <label for="email" class="col-sm-2 control-label">Role</label>

                  <div class="col-sm-10">
                    <select name="role" id="role" class="form-control">
					@foreach($role as $key=>$value)
					 <option value="{{$value->id}}">{{$value->role_name}}</option>
					 @endforeach
					</select>
					 @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <select name="status" id="status" class="form-control">
					
					
					 <option value="0">inactive</option>
					 <option value="1">active</option>
					 
					</select>
					 @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
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
   @if($title=='Edit')
	   <script>
     //alert('edit');
	 $("#role").val(<?php echo $user->role_id ; ?>).change();   
	 $("#status").val(<?php echo $user->status ; ?>).change();   
      </script>
   @endif

    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
 
    <script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>

@stop