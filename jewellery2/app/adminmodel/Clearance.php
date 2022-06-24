<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Clearance extends Model
{
    protected $table='tbl_clearance_products';
    public $timestamps=false;
	protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','added_by','ip','is_active'
    ];
    // use SoftDeletes;
    // protected $del = ['deleted_at'];
}
