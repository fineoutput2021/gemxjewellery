<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomOrder extends Model
{
    protected $table='tbl_custom_order';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','business_name','email','country_code','contact_number','country','message','image1','image2','image3','image4','image5','image6','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
