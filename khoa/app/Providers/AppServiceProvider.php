<?php

namespace App\Providers;
use App\word;
use App\songModel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('template.adminTemplate',function($view){
            $countword = word::count('*');
            $count = songModel::count('*');
            $view->with(['count'=>$count,'countword'=>$countword]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
