<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind('path.public', function() {
  	 	 return base_path('../public_html');
 		});*/
    }

    /**
     * Bootstrap any application services.
     *
     * @param Request $request
     * @return void
     */
    public function boot(Request $request)
    {
        config()->set('seotools.meta.defaults.title',trans('titles.app'));
        config()->set('seotools.meta.defaults.description',\App\Helpers\Helper::Setting('footer_about_compacy')->val);

        if (request('dbg') == "1")
            config()->set('debugbar.enabled', true);
        if (request('d') == "1") {
            config()->set('app.debug', true);
            config()->set('app.env', 'debug');
        }
        if (request('d') == "0") {
            config()->set('app.debug', false);
            config()->set('app.env', 'production');
        }

        Schema::defaultStringLength(191);

        Paginator::defaultView('vendor.pagination.bootstrap-4');

        if(in_array($request->segment(1),config('translatable.locales')))
            app()->setLocale($request->segment(1));
    }
}
