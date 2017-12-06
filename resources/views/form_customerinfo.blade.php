@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Josh Admin Template
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
        <h1>{{$title}} Customer</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    {{$title}} customer
                </a>
            </li>
        </ol>
    </section>

    <section class="content">

	  <div style="padding:10px">
	  @if($title=='Add')
         <form class="form-horizontal"  name="frm-designation" method="POST" action="{{url('add/customer')}}" autocomplete="off" >
	  @else
		   <form class="form-horizontal"  name="frm-designation" method="POST" action="{{url('update/customer')}}" autocomplete="off" >
	        <input type="hidden" name="cust_id" value="{{$customer->id}}">
	  @endif
		   {{ csrf_field() }}
              <div class="box-body">
			   
				<div class="form-group">
                  <label for="fname" class="col-sm-2 control-label">First Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "fname" value="{{$customer->first_name or ''}}" id="fname"  placeholder="First name">
					 @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="lname" class="col-sm-2 control-label">Last Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "lname" value="{{$customer->last_name or ''}}" id="lname"  placeholder="Last name">
					 @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="dob" class="col-sm-2 control-label">Date of Birth</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" name= "dob" value="{{$customer->dob or '' }}" id="dob"  placeholder="">
					 @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Mobile</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "mobile" value="{{$customer->mobile_number or ''}}" id="mobile"  placeholder="e.g 98213364545">
					 @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name= "email" value="{{$customer->email or ''}}" id="email"  placeholder="e.g demo@example.com">
					 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    
					<textarea class="form-control" name= "address" value="" id="address"  placeholder="e.g demo@example.com">{{$customer->address or ''}} </textarea>
				     @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="car_company" class="col-sm-2 control-label">Car Company </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "car_company" value="{{$customer->car_company or '' }}" id="car_company"  placeholder="e.g TATA ">
					 @if ($errors->has('car_company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('car_company') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="car_model" class="col-sm-2 control-label">Car Model</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "car_model" value="{{$customer->car_model or ''}}" id="car_model"  placeholder="e.g AS555">
					 @if ($errors->has('car_model'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('car_model') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="car_number" class="col-sm-2 control-label">Car Number</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "car_number" value="{{$customer->car_number or ''}}" id="car_number"  placeholder="e.g MH02AD2017">
					 @if ($errors->has('car_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('car_number') }}</strong>
                                    </span>
                                @endif
                  </div>
                </div>
				 <div class="form-group">
                  <div  class="col-sm-2 cols-offset-2"></div>
                  <div  class="col-sm-8 cols-offset-2">
				  <button type="submit" class="btn btn-primary btn-flat" id="submit" name="submit">Save</button>
				  &nbsp;  &nbsp;
				   <a type="reset" class="btn btn-danger  btn-flat"  href="{{url('/home')}}">Cancel</a>
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