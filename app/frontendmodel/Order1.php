<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order1 extends Model
{
    protected $table='tbl_order1';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'user_id','promocode','gift_promocode','total_amount','address_id','payment_type','payment_status','order_status','shipping','delivery_charge','track_id','payment_id','payer_id','payer_email','pay_amount','currency','paypal_payment_status','ip'

    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
