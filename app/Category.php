<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Возвращает "отношение" один ко многим между таблицами categories и products
    // Данное "отношение" используется в коде для получения всех Product для Category,
    // заполнения начальными данными и тд
    public function products() {
        return $this->hasMany('App\Product');
    }
}
