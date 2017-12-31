<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NanoCoinsRepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * User Repository App Bindings
         */
        $UserModels = [
            'User', 'Credential',
        ];

        // Bind User Contracts to User Repository
        foreach ($UserModels as $UserModel) {
            $this->app->bind("App\\Repository\\User\\Contracts\\{$UserModel}Interface", "App\\Repository\\User\Eloquent\\{$UserModel}Repository");
        }
        
        
        // Bind more below


        /**
         * Admin Repository App Bindings
         */
        $AdminModels = [
            // 'Admin',
        ];

        // Bind Admin Contracts to Admin Repository
        foreach ($AdminModels as $AdminModel) {
            $this->app->bind("App\\Repository\\Admin\\Contracts\\{$AdminModel}Interface", "App\\Repository\\Admin\Eloquent\\{$AdminModel}Repository");
        }

    }
}
