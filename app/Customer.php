<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function order() {
        return $this->hasOne('App\Order');
    }

    public function user() {
        return $this->hasOne('App\User');
    }
}
