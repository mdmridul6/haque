<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class BreadcrumbComposer
{
    public function compose(View $view)
    {
        $breadcrumbs = [];
        $routeName = Route::currentRouteName(); // e.g. admin.user.edit

        if ($routeName) {
            $parts = explode('.', $routeName);
            $url = '';

            foreach ($parts as $index => $part) {
                $title = Str::title(str_replace('-', ' ', $part)); // e.g. "user-management" → "User Management"

                // Build up URL only for earlier segments
                if ($index < count($parts) - 1) {
                    $url .= '/' . $part;
                    $breadcrumbs[] = ['title' => $title, 'url' => url($url)];
                } else {
                    $breadcrumbs[] = ['title' => $title, 'url' => null];
                }
            }
        }

        $view->with('breadcrumbs', $breadcrumbs);
    }
}
