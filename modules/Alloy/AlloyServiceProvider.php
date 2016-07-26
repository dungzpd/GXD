<?php

namespace Alloy;
use Illuminate\Foundation\Console\IlluminateCaster;
use Illuminate\Support\Facades\Storage;

/**
 * ServiceProvider
 * @package Alloy
 */
class AlloyServiceProvider extends \Illuminate\Support\ServiceProvider {

    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot() {
        // Load the routes for each of the modules
        if (file_exists(__DIR__ . '/routes.php')) {
            include __DIR__ . '/routes.php';
        }

        // Load the views
        if (is_dir(__DIR__ . '/Views')) {
            $this->loadViewsFrom(__DIR__ . '/Views', 'Alloy');
        }
    }

    public function register() {

        $this->app->singleton('League\Glide\Server', function ($app){
        	$filesystem = $app->make('Illuminate\Contracts\Filesystem\Filesystem');
	        return \League\Glide\ServerFactory::create([
		        'source' =>                  $filesystem->getDriver(),
			    'cache' =>                   $filesystem->getDriver(),
		        'source_path_prefix' =>      '/images',
			    'cache_path_prefix' =>       '/images/.cache',
			    'base_url' =>                'img'
			]);
        });

    }

}
