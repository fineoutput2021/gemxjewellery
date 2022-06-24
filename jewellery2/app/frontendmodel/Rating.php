<?php

namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    protected $table='tbl_product_rating';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'user_id','product_id','rating','description','name','email','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
