<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    protected $table='sub_category';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'category_id','name','image','ip','added_by','is_active','is_cat_delete'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
