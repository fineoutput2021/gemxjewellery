<?php
namespace App\frontendmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCatelogue extends Model
{
    protected $table='tbl_catelogue_form';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
          'catelogue_checkbx','business_name','contact_name','email','phone','country','ip',
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
