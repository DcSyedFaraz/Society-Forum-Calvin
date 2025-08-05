<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\GeneralSetting;
use App\Support\CustomLfm;
use UniSharp\LaravelFilemanager\Lfm;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Override the default Filemanager helper so we can customize
        // how request input is translated. The stock implementation
        // fails when an array is passed (e.g. moving multiple files).
        // Binding our extension ensures all package controllers use it.
        $this->app->bind(Lfm::class, function ($app) {
            return new CustomLfm($app['config'], $app['request']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $REQUEST)
    {
        // $data['page'] = Request::segment(1);
        // $data['category'] = Category::all();
        // $data['generalsetting'] = GeneralSetting::first();
        // return View::share($data);

    }
}
