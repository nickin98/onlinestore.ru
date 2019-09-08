<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;
    // Возвращает "отношение" один ко многим между таблицами categories и products
    // Данное "отношение" используется в коде для получения всех Product для Category,
    // заполнения начальными данными и тд
    public function products() {
        return $this->hasMany('App\Product');
    }

    public static function getCategoryIdByTitle($title) {
        $categoryId = Category::where('title', $title)->first()->id;
        return $categoryId;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
