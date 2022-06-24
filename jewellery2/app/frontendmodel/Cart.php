<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    protected $table='tbl_cart';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'status','product_id','color_id','stone','metal','font_size','engrave_text','font_family','size','user_id','quantity','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
