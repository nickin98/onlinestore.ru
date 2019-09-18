<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('exist_product', function ($attribute, $value, $parameters, $validator) {
            try {
                $productIds = Product::all()->pluck('id')->toArray();
                $products = json_decode($value, true);
                foreach($products as $productId => $product) {
                    if (!in_array($productId, $productIds)) {
                        dd($productId);
                        return false;
                    }
                }
                return true;
            } catch(\Exception $e) {
                return false;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
