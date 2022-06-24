<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsLetter extends Model
{
    protected $table='tbl_newsletter';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','email','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
