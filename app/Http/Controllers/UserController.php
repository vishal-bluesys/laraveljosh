<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Session;
use App\Role;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index(Request $request)
    {
		$role = Role::All();
		//echo json_encode($role);
		$user = User::with('role');
		$inputarr = $request->input();
		
		//print_r($inputarr);
		 if(isset($inputarr['f'])){
		   $inputs = $inputarr['f'];
		   if(count($inputarr['f'])>2){
			      if($inputs['name']){
					$user = $user->where('name','like','%'.$inputs['name'].'%');
					
				   }
				   if($inputs['email']){
					$user = $user->where('email','like','%'.$inputs['email'].'%');
					
				   }
				   if($inputs['role_id']){
					$user = $user->where('role_id','like','%'.$inputs['role_id'].'%');
					
				   }
				   if($inputs['status']){
					$user = $user->where('status','like','%'.$inputs['status'].'%');
					
				   }
			   if($inputs['order_by']){
			 $user = $user->orderby($inputs['order_by'],$inputs['order_dir']);
			 }
		 }else{
			
			 $user = $user->orderby($inputarr['f']['order_by'],$inputarr['f']['order_dir']);
			 }
		 }
		 
		$user= $user->paginate(20);
		//echo json_encode($user);
		$grid = new \Datagrid($user,$request->input('f', []));
		
		$grid
			->setColumn('name', 'Name', [
				// Will be sortable column
				'sortable'    => true,
				// Will have filter
				'has_filters' => true
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
			
			->setColumn('role_id', 'Role', [
				// Will be sortable column
				'refers_to'   => 'role.role_name',
				'sortable'    => true,
				// Will have filter
				'has_filters' => true,
				'filters'     => Role::all()->pluck('role_name','id')->toArray(),
			])
			
			->setColumn('status', 'Status', [
				'sortable'    => true,
				'has_filters' => true,
				'wrapper'     => function ($value, $row) {
					return ($value == 1) ? 'active' : 'inactive';
				}
				])
				
			->setActionColumn([
				'wrapper' => function ($value, $row) {
					return "  <a href='".url('/user/edit')."/".$row->id."' title='Edit' class='btn btn-xs'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
							  <a href='".url('/user/delete')."/".$row->id."' title='Delete' data-method='DELETE' class='btn btn-xs text-danger delete' data-confirm='Are you sure?'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>";
				}
			]);

				
			return view('users.user_grid',['grid' => $grid]);
	}
	
	
	public function showForm(){
		$user = [];
		$role = Role::All();
		$title = "Add";
		return view('users.form_user',compact('user','title','role'));
	}
	
	public function addUser(Request $request){
		
		 $validator = Validator::make($request->all(), [
	        'name' => 'required|regex:/^[(a-zA-Z\s)(0-9\s)]+$/u',
	        'email' => 'email',
			'password'=>'required',
            'role'=>'required',
            'status'=>'required'			
        ]);
		
		if($validator->fails()){
			 return back()
                        ->withErrors($validator)
                        ->withInput();
		}
		
		$user = User::Create([
		 'name'=>$request->input('name'),
		 'email'=>$request->input('email'),
		 'password'=>bcrypt($request->input('password')),
		 'role_id'=>$request->input('role'),
		 'status'=>$request->input('status'),
		 'created_at'=>date('Y-m-d')		
		]);		
		
		if($user){
			Session::flash('success', 'Saved successfully');
			return redirect('/user');
			
		}else{
			return back()
                     ->withInput();
			
		}
		//return redirect('/user');
	}  
	
	public function showEdit($id){
		$user = User::where('id',$id)->first();
		$role = Role::All();
		$title = "Edit";
		return view('users.form_user',compact('user','title','role'));
	}
	
	public function updateUser(Request $request){
		
		 $validator = Validator::make($request->all(), [
	        'name' => 'required|regex:/^[(a-zA-Z\s)(0-9\s)]+$/u',
	        'email' => 'email',
			'role'=>'required',
            'status'=>'required'			
        ]);
		
		if($validator->fails()){
			 return back()
                        ->withErrors($validator)
                        ->withInput();
		}
		if($request->input('password')!="" || $request->input('password')!= null ){
			$user = User::where('id',$request->input('user_id'))->update([
								 'name'=>$request->input('name'),
								 'email'=>$request->input('email'),
								 'password'=>bcrypt($request->input('password')),
								 'role_id'=>$request->input('role'),
								 'status'=>$request->input('status'),
								 'updated_at'=>date('Y-m-d')		
								]);		
			
		}else{
		$user = User::where('id',$request->input('user_id'))->update([
								 'name'=>$request->input('name'),
								 'email'=>$request->input('email'),
								 'role_id'=>$request->input('role'),
								 'status'=>$request->input('status'),
								 'updated_at'=>date('Y-m-d')		
								]);		
		}
		if($user){
			Session::flash('success', 'Saved successfully');
			return redirect('/user');
			
		}else{
			Session::flash('error', 'please check if you havent changed any field');
			return back()
                     ->withInput();
			
		}
		//return redirect('/user');
	}
	
	
		
	public function deleteUser($id){
		
		$user = User::where('id',$id)->delete();
		if($user){
			Session::flash('success', 'Deleted successfully');
			
		}else{
			Session::flash('error', 'Delete Operation Failed');
		}
		return back();
	}
	
	
}
