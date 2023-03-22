<?php

namespace App\Providers;

use App\Socialite\Zoom\ZoomManager;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\SocialiteServiceProvider as ServiceProvider;

class ZoomServiceProvider extends ServiceProvider
{
    // public function register()
    // {
    //     $this->app->singleton(Factory::class, function ($app) {
    //         $app['config']['services'] = array_merge($app['config']['services'], require config_path('services.php'));
    //         // dd($app['config']['services']);
    //         return new ZoomManager($app);
    //     });

    //     // 追加: ZoomManager を SocialiteManager として登録
    //     $this->app->alias(Socialite\Contracts\Factory::class, SocialiteManager::class);
    // }

    public function boot()
    {
        $this->app->singleton(Factory::class, function ($app) {
            // dd($this->app);
            $app['config']['services'] = array_merge(require config_path('services.php'), $app['config']['services']);
            // dd($app['config']['services']);　←ここでは値が取れるがZoomManager.phpに渡せない
            return new ZoomManager($app);
        });
    }
}
