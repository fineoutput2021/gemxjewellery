<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCardPrice extends Model
{
    protected $table='tbl_giftcard_price';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'price','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
