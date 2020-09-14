<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = [
        'product_id',
        'color_id',
        'symbol_id',
        'order_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function color()
    {
        return $this->belongsTo('App\Color');
    }

    public function symbol()
    {
        return $this->belongsTo('App\Symbol');
    }
}
