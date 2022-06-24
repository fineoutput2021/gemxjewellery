<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomizeProductStone extends Model
{
    protected $table='tbl_customize_product_stones';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','cust_metal_id','name','price','stone_image','stone_product_image','metal_product_image','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
