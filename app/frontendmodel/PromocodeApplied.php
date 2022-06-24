<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromocodeApplied extends Model
{
    protected $table='tbl_promocode_applied';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'user_id','order_id','promocode_id'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
