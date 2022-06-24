<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homepage_imgs extends Model
{
    protected $table='tbl_homepage_imgs';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'image','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
