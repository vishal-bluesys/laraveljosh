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
		  
		  <style>
		  .profile .col-sm-2 , .profile .col-sm-6, .profile .col-sm-4{
			  padding : 10px;
		  }
         </style>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>{{$title}} </h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    {{$title}} 
                </a>
            </li>
        </ol>
    </section>

    <section class="content">
  
	  <div style="padding:10px">
	     <div class="row">
		   <div class="col-sm-8">
		     <div class="row profile"><div class="col-sm-2">Name :  </div><div class="col-sm-6">  {{$user->name or ''}} </div></div>
		     <div class="row profile"><div class="col-sm-2">Email :  </div><div class="col-sm-6"> {{$user->email or ''}} </div></div>
		     <div class="row profile"><div class="col-sm-2">Role :  </div><div  class="col-sm-6">  {{$user->role->role_name or ''}} </div></div>
		     <div class="row profile"><div class="col-sm-2">Status :  </div><div class="col-sm-6"> {{($user->status==1) ? 'Active' : Inactive}} </div></div>
		   
		   
		   </div>
		   <div class="col-sm-4">
		         <img src="{{url('images/profile')}}/{{$user->pic}}"
                                     class="img-responsive img-circle" alt="User Image">
		     
			  <form action="{{url('user/profile/upload')}}"  name="profileUpload" method = "post" enctype="multipart/form-data">
				  {{csrf_field()}}
			   <div class="row profile"><div class="col-sm-4">Upload Pic :  </div><div class="col-sm-6"> <input type="file" name="profilepic" > <input type="hidden" name="id" value="{{$user->id}}"> </div></div>
                <input type="submit" name="submit" class="btn btn-primary" value="Upload"> <input class="btn btn-danger" type="reset" name="reset" value="Cancel">	
				 @if ($errors->has('profilepic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilepic') }}</strong>
                                    </span>
                                @endif
			  </form>
		   </div>
		 
		 
		 
   
				
      </div>        
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')


    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
 
    <script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>

@stop