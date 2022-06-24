<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    protected $table='tbl_countries';
    public $timestamps=false;
	protected $primaryKey = 'id';

    protected $fillable = [
          'country_name'
    ];
    // use SoftDeletes;
    // protected $del = ['deleted_at'];
}
