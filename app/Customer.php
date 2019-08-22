<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Возвращает "отношение" один ко многим между таблицами customers и orders
    // Данное "отношение" используется в коде для получения всех Order для Customer,
    // заполнения начальными данными и тд
    public function orders() {
        return $this->hasMany('App\Order');
    }

    // Возвращает "обратное отношение" один к одному между таблицами users и customers
    // Данное "обратное отношение" используется в коде для получения единственного существующего User соответствующего Customer,
    // заполнения начальными данными и тд
    public function user() {
        return $this->belongsTo('App\User');
    }
}
