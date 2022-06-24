<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountriesCurrency extends Model
{
    protected $table='tbl_country_currency';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'country','sign','currency_price','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
