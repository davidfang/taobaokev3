<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('App\Repositories\Contracts\GoodsCategoryInterface', 'App\Repositories\Eloquents\GoodsCategoryRepository');
      $this->app->bind('App\Repositories\Contracts\TaobaoTbkDgMaterialOptionalInterface', 'App\Repositories\Eloquents\TaobaoTbkDgMaterialOptionalRepository');
      $this->app->bind('App\Repositories\Contracts\AlimamaRepositoryInterface', 'App\Repositories\Eloquents\AlimamaRepository');
    }
}
