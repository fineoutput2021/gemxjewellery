<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    protected $table='tbl_wishlist';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'user_id','product_id'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
