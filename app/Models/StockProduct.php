<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model 
{

    protected $table = 'stocks_products';
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function supplier()
    {
        return $this->belongsTo('\Supplier');
    }

}