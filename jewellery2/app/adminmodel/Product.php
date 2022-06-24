<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table='tbl_products';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','category','sub_category_id','mini_subcategory_id','sku_id','sdesc','tag','point1','point2','point3','point4','point5','ip','added_by','is_active','is_cat_delete','is_subcat_delete','is_mini_subcat_delete','ldesc'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
