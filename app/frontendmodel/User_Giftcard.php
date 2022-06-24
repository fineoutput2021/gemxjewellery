<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Giftcard extends Model
{
    protected $table='tbl_user_giftcard';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'sender_fname','sender_lname','user_id','giftcard_id','giftcard_price_id','recipent_fname','recipent_lname','friend_email','confirm_friend_email','message','address_id', 'payment_status','payment_type','order_status','payment_id','payer_id','payer_email','pay_amount','currency','paypal_payment_status','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
