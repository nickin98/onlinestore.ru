<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    // Возвращает "обратное отношение" один ко многим между таблицами categories и products
    // Данное "обратное отношение" используется в коде для получения единственнго существующего Category для Product,
    // заполнения начальными данными и тд
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // Возвращает "отношение" многие ко многим между таблицами customers и products
    // Данное "отношение" используется в коде для получения всех Order для Product,
    // заполнения начальными данными и тд
    public function orders() {
        return $this->belongsToMany('App\Order');
    }

    public function saveImage($request) {
        $path = $request->file('image')->store('public/images');
        $full_path = storage_path('app') . '/' . $path;
        $image = \Image::make($full_path);
//        $image->fit(400, 400, function ($img) {
////            $img->aspectRatio();
//            $img->upsize();
//        });

        $image->resize(400, 400, function ($img) {
//            $img->aspectRatio();
            $img->upsize();
        });

        $image->save($full_path);

        return $path;
    }

    public function getImagePath() {
        $exist = Storage::disk('public')->exists('images/' . $this->image);
        if ($exist) {
            $image = asset('storage/images/' . $this->image);
        } else {
            $image = asset('storage/images/empty.png');
        }

        return $image;
    }
}
