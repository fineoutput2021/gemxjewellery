<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    protected $table='tbl_team';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','email','password','phone','address','image','power','services','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
