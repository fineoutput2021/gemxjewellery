<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Admin_notification extends Model
{
    protected $table='tbl_admin_notification';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'title','message','ip','created_at'
    ];
    // use SoftDeletes;
    // protected $del = ['deleted_at'];
}
