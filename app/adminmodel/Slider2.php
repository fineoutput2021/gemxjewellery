<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider2 extends Model
{
    protected $table='tbl_slider2';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','link','image','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
