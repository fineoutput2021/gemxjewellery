<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EngraveProduct extends Model
{
    protected $table='tbl_engrave_product';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'category_id','name','s_desc','size','base_price','image','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
