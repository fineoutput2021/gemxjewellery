<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    protected $table='tbl_variant';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','name','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
