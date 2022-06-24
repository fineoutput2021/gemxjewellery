<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Style extends Model
{
    protected $table='tbl_style';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
