<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function order() {
        return $this->hasOne('App\Order');
    }

    public function product() {
        return $this->hasOne('App\Product');
    }
}
