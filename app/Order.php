<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Возвращает "обратное отношение" один ко многим между таблицами customers и orders
    // Данное "обратное отношение" используется в коде для получения единственного существующего Customer соответствующего Order,
    // заполнения начальными данными и тд
    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    // Возвращает "отношение" многие ко многим между таблицами customers и products
    // Данное "отношение" используется в коде для получения всех Product для Order,
    // заполнения начальными данными и тд
    public function products() {
        return $this->belongsToMany('App\Product');
    }

    protected $fillable = ['status'];


}
