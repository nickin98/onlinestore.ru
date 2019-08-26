<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Возвращает "отношение" один к одному между таблицами users и roles
    // Данное "обратное отношение" используется в коде для получения единственного существующего User соответствующего Role
    public function user() {
        return $this->hasOne('App\User');
    }
}
