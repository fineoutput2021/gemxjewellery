<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
    protected $table='tbl_promocode';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'promocode','image','offer_type','percent','amount_off','type','minimum_amount','maximum_gift_amount','order_qualify_type','quantity','minimum_order_total','start_date','expiry_date','terms_and_conditions','added_by','is_active','from_status'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
