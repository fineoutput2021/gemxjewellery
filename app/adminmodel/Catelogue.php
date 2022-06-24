<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catelogue extends Model
{
    protected $table='tbl_catelogue';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','image','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
