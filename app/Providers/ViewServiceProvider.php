<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $settings = Settings::whereSlug(Settings::METRICS_SLUG)->first();

            $fields = $settings && $settings->fields ? $settings->fields : [];

            $view->with('beginScripts', optional($fields)->scripts_begin)
                ->with('endScripts', optional($fields)->scripts_end)
                ->with('headScripts', optional($fields)->scripts_head);
        });
    }
}
