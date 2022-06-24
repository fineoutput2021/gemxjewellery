<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    protected $table='tbl_sale';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'sale','offer_type','percent','order_qualify_type','quantity','minimum_order_total','start_date','expiry_date','terms_and_conditions','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
