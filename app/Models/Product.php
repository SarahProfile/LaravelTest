<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model 
{

    protected $table = 'products';
    protected $fillable = ['title','price','category_id','describtion','productCode','product_image'];
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsTo( 'App\Models\Category');
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

}