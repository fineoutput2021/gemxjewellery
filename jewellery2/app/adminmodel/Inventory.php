<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    protected $table='tbl_inventory';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','color_id','gemstone_id','stock','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
