<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageItem extends Model
{
    protected $table='tbl_package';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','description','image','price','buy_price','validity','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
