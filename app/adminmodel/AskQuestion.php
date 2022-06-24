<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AskQuestion extends Model
{
    protected $table='tbl_ask_question';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','email','product_id','message','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
