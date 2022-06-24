<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    protected $table='tbl_colors';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','code','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
