<?php

namespace App\Models;
use BinaryCats\Sku\HasSku;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory,SoftDeletes,HasSku;

    protected $primaryKey = 'id';

    protected $table = "products";

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class,'product_category_id','id');
    }

    
}
