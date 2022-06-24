<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    protected $table='tbl_users';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','email','contact','password','package','total_amount','payment_status','order_status','payment_id','payer_id','payer_email','pay_amount','currency','paypal_payment_status','package_buy_date','pay_amount','ip', 'added_by','is_active','expiry_date'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
