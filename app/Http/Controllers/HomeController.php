<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Role;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$customer = Customer::where('car_number','!=','0');
		$inputarr = $request->input();
		
		//print_r($inputarr);
		 if(isset($inputarr['f'])){
		   $inputs = $inputarr['f'];
		   if(count($inputarr['f'])>2){
				   if($inputs['first_name']){
					$customer = $customer->where('first_name','like','%'.$inputs['first_name'].'%');
					
				   }
				   if($inputs['last_name']){
					$customer = $customer->where('last_name','like','%'.$inputs['last_name'].'%');
					
				   }
				   if($inputs['dob']){
					$customer = $customer->where('dob',$inputs['dob']);
					
				   }
				   if($inputs['email']){
					$customer = $customer->where('email','like','%'.$inputs['email'].'%');
					
				   }
				   if($inputs['mobile_number']){
					$customer = $customer->where('mobile_number','like','%'.$inputs['mobile_number'].'%');
					
				   }
				   if($inputs['car_company']){
					$customer = $customer->where('car_company','like','%'.$inputs['car_company'].'%');
					
				   }
				   if($inputs['car_model']){
					$customer = $customer->where('car_model','like','%'.$inputs['car_model'].'%');
					
				   }
				   if($inputs['car_number']){
					$customer = $customer->where('car_number','like','%'.$inputs['car_number'].'%');
					
				   }
				   
				   
				   
		   }else{
				 
			$customer = $customer->orderby($inputs['order_by'],$inputs['order_dir']);
			
			}
		 }
		 
		  $customer= $customer->paginate(10);
		$grid = new \Datagrid($customer,$request->input('f', []));
		
		$grid
			->setColumn('first_name', 'First Name', [
				// Will be sortable column
				'sortable'    => true,
				// Will have filter
				'has_filters' => true
			])
			->setColumn('last_name', 'Last Name', [
				// Will be sortable column
				'sortable'    => true,
				// Will have filter
				'has_filters' => true
			])
			
			->setColumn('dob', 'DOB', [
				'sortable'    => true,
				'has_filters' => true,
				])
				
			->setColumn('email', 'Email', [
				'sortable'    => true,
				'has_filters' => true,
				// Wrapper closure will accept two params
				// $value is the actual cell value
				// $row are the all values for this row
				'wrapper'     => function ($value, $row) {
					return '<a href="mailto:' . $value . '">' . $value . '</a>';
				}
			])
			
		
			->setColumn('mobile_number', 'Mobile', [
				'sortable'    => true,
				'has_filters' => true,
				'wrapper'     => function ($value, $row) {
					// The value here is still Carbon instance, so you can format it using the Carbon methods
					return $value;
				}
			])
			
			->setColumn('car_company', 'Company', [
				'sortable'    => true,
				'has_filters' => true
			])
			
			->setColumn('car_model', 'Model', [
				'sortable'    => true,
				'has_filters' => true
			])
			
			->setColumn('car_number', 'Car Number', [
				'sortable'    => true,
				'has_filters' => true
			])
			// Setup action column
			->setActionColumn([
				'wrapper' => function ($value, $row) {
					return "<a href='".url('/customer/show')."/".$row->id."' title='show' class='btn btn-xs'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a>
						       <a href='".url('/customer/edit')."/".$row->id."' title='Edit' class='btn btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
							  <a href='".url('/customer/delete')."/".$row->id."' title='Delete' data-method='DELETE' class='btn btn-xs text-danger delete' data-confirm='Are you sure?'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>";
				}
			]);

		// Finally pass the grid object to the view
		//return view('grid', ['grid' => $grid]);
		
        return view('index',['grid' => $grid]);
    }
	
	
	public function showForm(){
		$customer = [];
		$title = "Add";
		return view('form_customerinfo',compact('customer','title'));
	}
	public function showEdit($id){
		$customer = Customer::where('id',$id)->first();
		$title = "Edit";
	   return view('form_customerinfo',compact('customer','title'));
	}
	public function showCustomer($id){
		$customer = Customer::where('id',$id)->first();
		$title = $customer->first_name." ".$customer->last_name;
	   return view('show_customer',compact('customer','title'));
	}
	public function addCustomer(Request $request){
		
		 $validator = Validator::make($request->all(), [
	        'fname' => 'required|regex:/^[(a-zA-Z\s)(0-9\s)]+$/u',
	        'lname' => 'required|regex:/^[(a-zA-Z\s)(0-9\s)]+$/u',
		    'dob' => 'required|date',
            'email' => 'email',
            'mobile' => 'numeric',
            'car_number' => 'required|regex:/^[(a-zA-Z\s)(0-9\s)]+$/u',
         			         
        ]);
		
		if($validator->fails()){
			 return back()
                        ->withErrors($validator)
                        ->withInput();
		}
		
		$customer = Customer::create([
		'first_name'=>$request->input('fname'),
		'last_name'=>$request->input('lname'),
		'dob'=>$request->input('dob'),
		'mobile_number'=>$request->input('mobile'),
		'email'=>$request->input('email'),
		'address'=>$request->input('address'),
		'car_company'=>$request->input('car_company'),
		'car_model'=>$request->input('car_model'),
		'car_number'=>$request->input('car_number'),
		'created_at'=>date('Y-m-d')

		]);
		
		if($customer){
			Session::flash('success', 'Saved successfully');
			return redirect('/home');
			
		}else{
			return back()
                     ->withInput();
			
		}
		
	
	}
	public function updateCustomer(Request $request){
		
		 $validator = Validator::make($request->all(), [
	        'fname' => 'required|regex:/^[(a-zA-Z\s)(0-9\s)]+$/u',
	        'lname' => 'required|regex:/^[(a-zA-Z\s)(0-9\s)]+$/u',
		    'dob' => 'required|date',
            'email' => 'email',
            'mobile' => 'numeric',
            'car_number' => 'required|regex:/^[(a-zA-Z\s)(0-9\s)]+$/u',
         			         
        ]);
		
		if($validator->fails()){
			 return back()
                        ->withErrors($validator)
                        ->withInput();
		}
		
		$customer = Customer::where('id',$request->input('cust_id'))->update([
		'first_name'=>$request->input('fname'),
		'last_name'=>$request->input('lname'),
		'dob'=>$request->input('dob'),
		'mobile_number'=>$request->input('mobile'),
		'email'=>$request->input('email'),
		'address'=>$request->input('address'),
		'car_company'=>$request->input('car_company'),
		'car_model'=>$request->input('car_model'),
		'car_number'=>$request->input('car_number'),
		'created_at'=>date('Y-m-d')

		]);
		
		
			Session::flash('success', 'Saved successfully');
			return redirect('/home');
	
		
		
	}
	
	public function deleteCustomer($id){
		
		$customer = Customer::where('id',$id)->delete();
		if($customer){
			Session::flash('success', 'Deleted successfully');
			
		}else{
			Session::flash('error', 'Delete Operation Failed');
		}
		return back();
	}
}
