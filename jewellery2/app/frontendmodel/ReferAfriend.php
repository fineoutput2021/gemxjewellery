<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferAfriend extends Model
{
    protected $table='tbl_refer_friend';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'name','email','giftcard','invite_email','subject','note','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
