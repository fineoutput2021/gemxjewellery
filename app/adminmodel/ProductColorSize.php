<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductColorSize extends Model
{
    protected $table='tbl_product_color_size';
    public $timestamps=true;
	protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','color_id','gemstone_id','style_id','shape_id','plating_id','metal_id','material_id','mrp','price','image1','image2','image3','image4','ip','added_by','is_active'
    ];
    use SoftDeletes;
    protected $del = ['deleted_at'];
}
