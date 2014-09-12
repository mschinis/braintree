<?php namespace Mschinis\Braintree;

use Mschinis\Braintree\BraintreeControllerCommand;
use \Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\Config;
use \Illuminate\Support\Facades\View;
use \Illuminate\Support\Facades\Blade;
use \Illuminate\Support\Facades\Artisan;
use \Braintree_Configuration;

class BraintreeServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
    {
		$this->package('mschinis/braintree');

        $this->app->bind('mschinis::command.braintree.example', function($app) {
            return new BraintreeExampleCommand($app['files']);
        });
        $this->commands(array(
            'mschinis::command.braintree.example'
        ));



        Braintree_Configuration::environment(Config::get('braintree::environment'));
        Braintree_Configuration::merchantId(Config::get('braintree::merchantId'));
        Braintree_Configuration::publicKey(Config::get('braintree::publicKey'));
        Braintree_Configuration::privateKey(Config::get('braintree::privateKey'));

        $encryptionKey = Config::get('braintree::config.CSEKey');

        Blade::extend(function($view, $compiler) use ($encryptionKey)
        {
            $pattern = $compiler->createPlainMatcher('braintreeCSEKey');

            return preg_replace($pattern, '$1<?php echo "'.$encryptionKey.'" ?>', $view);
        });
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
