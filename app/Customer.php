<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;  
    protected $table = 'customer_info';
   
   protected $fillable=['id', 'first_name', 'last_name', 'dob', 'mobile_number','email','address', 'car_company', 'car_model', 'car_number', 'created_at', 'updated_at', 'deleted_at'];
    protected $hidden = [ 'created_at', 'updated_at', 'deleted_at'];
	protected $date = ['deleted_at'];
   
}
