<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MiniSubCategory extends Model
{
    protected $table='mini_sub_category';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'category_id','subcategory_id','name','image','ip','added_by','is_active','is_cat_delete','is_subcat_delete'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
