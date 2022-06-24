<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Countries extends Model
{
    protected $table='tbl_countries';
    public $timestamps=false;
	protected $primaryKey = 'id';

    protected $fillable = [
        'CountryName'
    ];
    // use SoftDeletes;
    // protected $del = ['deleted_at'];
}
