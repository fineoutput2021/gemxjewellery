<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    protected $table='tbl_contact';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','email','contact_number','subject','message','ip'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
