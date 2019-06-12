<?php
/**
 * Created by PhpStorm.
 * User: chenjiahao
 * Date: 2019-05-29
 * Time: 09:54
 */

namespace GLParam;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class GLParamServiceProvider extends ServiceProvider
{
 


    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config' => config_path()], 'glparam');
        }


        $this->app->singleton(
            'glparam',
            function (){
                return new Param(config('gl_param'));
            }
        );

    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
       
    }

}
