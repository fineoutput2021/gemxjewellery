<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    protected $table='tbl_appointment';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'f_name','l_name','time','phone','email','subcategory_id','finish','discuss','country','ip','created_at'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
