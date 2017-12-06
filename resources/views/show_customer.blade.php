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
        <h1>{{$title}}</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                     customer info
                </a>
            </li>
        </ol>
    </section>

    <section class="content">

	  <div style="padding:10px">
	 
         <form class="form-horizontal"  name="frm-designation" method="POST" action="{{url('add/customer')}}" autocomplete="off" >
	  
		  
              <div class="box-body">
			   
				<div class="form-group">
                  <label for="fname" class="col-sm-2 control-label">First Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "fname" value="{{$customer->first_name or ''}}" id="fname" disabled  placeholder="First name">
					
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="lname" class="col-sm-2 control-label">Last Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "lname" value="{{$customer->last_name or ''}}" id="lname" disabled placeholder="Last name">
					
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="dob" class="col-sm-2 control-label">Date of Birth</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" name= "dob" value="{{$customer->dob or '' }}" id="dob" disabled  placeholder="">
					
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Mobile</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "mobile" value="{{$customer->mobile_number or ''}}" id="mobile" disabled  placeholder="e.g 98213364545">
					
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name= "email" value="{{$customer->email or ''}}" id="email"  disabled placeholder="e.g demo@example.com">
					 
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    
					<textarea class="form-control" name= "address" value="" id="address" disabled  placeholder="e.g demo@example.com">{{$customer->address or ''}} </textarea>
				     
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="car_company" class="col-sm-2 control-label">Car Company </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "car_company" value="{{$customer->car_company or '' }}" id="car_company" disabled placeholder="e.g TATA ">
					 
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="car_model" class="col-sm-2 control-label">Car Model</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "car_model" value="{{$customer->car_model or ''}}" disabled id="car_model"  placeholder="e.g AS555">
					 
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="car_number" class="col-sm-2 control-label">Car Number</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name= "car_number" value="{{$customer->car_number or ''}}" id="car_number"  disabled  placeholder="e.g MH02AD2017">
					
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