<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Periode;
use App\Models\progress;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('is_admin', function(User $users){
            return $users->role === 'Admin';
        });

        Gate::define('is_eksternal', function(User $users){
            return $users->role === 'Eksternal';
        });

        Gate::define('is_OPD', function(User $users){
            return $users->role === 'OPD';
        });
        
        // if (Gate::forUser($user->role === 'Eksternal')->allows('index', $periode)){
            // return $users->role === 'Eksternal';
        //};
    }
}