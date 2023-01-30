<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];
//    1-1 belongto 1-nhiều : hasMany
    public function author(){
        return $this->belongsTo(Author::class,'author_id','id');
    }
    public function nxb(){
        return $this->belongsTo(NXB::class,'nxb_id','id');
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productComments(){
        return $this->hasMany(ProductComment::class,'product_id','id');
    }
    public function productCategory(){
        return $this->belongsTo(Category::class,'product_category_id','id');
    }




}
