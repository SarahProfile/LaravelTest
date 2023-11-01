<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model 
{

    protected $table = 'stocks';
    protected $fillable = ['last_added_date','product_id','supplier_name','quantity_added','supplier2','date2'];
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class, );
    }

    // public function products()
    // {
    //     return $this->hasMany('App\Models\StockProduct');
    // }

}