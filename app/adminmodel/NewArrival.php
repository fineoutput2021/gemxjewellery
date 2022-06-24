<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class NewArrival extends Model
{
    protected $table='tbl_new_arrival_products';
    public $timestamps=false;
	protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','added_by','ip','is_active'
    ];
    // use SoftDeletes;
    // protected $del = ['deleted_at'];
}
