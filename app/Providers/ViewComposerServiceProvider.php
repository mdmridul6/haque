<?php

namespace App\Providers;

use App\Http\View\Composers\BreadcrumbComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Automatically inject $pageTitle based on route name or view name
        View::composer('*', function ($view) {
            if (! $view->offsetExists('pageTitle')) {
                $route = request()->route();
                $name = $route?->getName() ?? 'Page';

                $pageTitle = Str::title(Str::replace('.', ' ', Str::after($name,'.'))); // e.g. admin.users.edit → Edit
                $view->with('pageTitle', $pageTitle);
            }
        });
        View::composer('*', BreadcrumbComposer::class);
    }
}
