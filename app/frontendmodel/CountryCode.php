<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class CountryCode extends Model
{
    protected $table='country';
    public $timestamps=false;
	protected $primaryKey = 'id';

    protected $fillable = [
          'iso','name','nicename','iso3','numcode','phonecode',
    ];
    // use SoftDeletes;
    // protected $del = ['deleted_at'];
}
