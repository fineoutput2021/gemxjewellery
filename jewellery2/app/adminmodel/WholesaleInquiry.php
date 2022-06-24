<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WholesaleInquiry extends Model
{
    protected $table='tbl_wholesale_inquiry';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','business_name','email','country_code','contact_number','country','message','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
