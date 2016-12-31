<?php namespace H34\Core;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	public function boot(){
		$this->publishes([
	        __DIR__.'/resources/views' => base_path('resources/views/'),
	    ], 'views');

	    $this->publishes([
        __DIR__.'/assets' => public_path('packages/h34/core'),
    ], 'public');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
