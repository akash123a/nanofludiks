<?php

namespace App\Providers;
 

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // ✅ THIS LINE WAS MISSING

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    
    public function boot(): void
    {
        //
        Route::middleware('web')
    ->group(base_path('routes/admin.php'));
        Route::middleware('web')
    ->group(base_path('routes/api.php'));
    }
}
