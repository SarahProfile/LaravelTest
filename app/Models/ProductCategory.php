<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model 
{

    protected $table = 'products_categories';
    protected $fillable = ['product_id','category_id'];
    public $timestamps = true;
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}