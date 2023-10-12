<?php

namespace App\Providers;

use App\Models\Category;
use App\View\Composers\FrontendComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class viewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $categories = Category::pluck('title','slug')->toArray();
        // View::share('categories', $categories);    
        
         // Using class based composers...
         View::composer('components.partials.navbar', FrontendComposer::class);
    }
}
