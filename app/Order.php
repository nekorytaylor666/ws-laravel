<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'status_id',
        'client_id'
    ];

    protected $attributes = [
        'status_id' => 1
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }
}
