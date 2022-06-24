<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order2 extends Model
{
    protected $table='tbl_order2';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'main_id','status','product_id','gemstone_id','color_id','metal','size','stone','font_size','engrave_text','font_family','quantity','amount','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
