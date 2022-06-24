<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Forgot_pass extends Model
{
    protected $table='tbl_forgot_pass';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'user_id','txn_id','status','ip'
    ];
    // use SoftDeletes;
    // protected $del = ['deleted_at'];
}
