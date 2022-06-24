<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCard extends Model
{
    protected $table='tbl_gift_card';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','image','description','price','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
