<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    protected $table='tbl_cart';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
      'status','product_id','color_id','user_id','quantity','size','ip','stone','metal','font_size','engrave_text','font_family'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
