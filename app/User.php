<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Возвращает "отношение" один к одному между таблицами users и customers
    // Данное "отношение" используется в коде для получения единственного существующего Customer соответствующего User,
    // заполнения начальными данными и тд
    public function customer() {
        return $this->hasOne('App\Customer');
    }
}
