<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleProduct extends Model
{
    protected $table='tbl_sale_products';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'sale_id','product_id','category_id','sub_category_id','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
