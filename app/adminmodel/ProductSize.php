<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSize extends Model
{
    protected $table='tbl_product_size';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','size_id','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
