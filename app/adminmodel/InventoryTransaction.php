<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryTransaction extends Model
{
    protected $table='tbl_inventory_transaction';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','color_id','stock','type','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
