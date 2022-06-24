<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    protected $table='tbl_user_address';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'user_id','address','doorflat','landmark','latitude','longitude','location_address','country','zipcode','customer_name','customer_email','customer_number'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
