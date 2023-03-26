<?php

// namespace App\Socialite\Zoom;

// use Laravel\Socialite\SocialiteManager as BaseManager;

// class ZoomManager extends BaseManager
// {
//     public function __construct($app)
//     {
//         parent::__construct($app);
//     }

//     protected function createZoomDriver()
//     {
//         // dd($this->app);
//         $config = $this->app['config']['services.zoom'];
//         // var_dump($config);
//         return $this->buildProvider(ZoomProvider::class, $config);
//     }

//     public function createDriver($driver)
//     {
//         if ($driver === 'zoom') {
//             return $this->createZoomDriver();
//         }

//         return parent::createDriver($driver);
//     }
// }
