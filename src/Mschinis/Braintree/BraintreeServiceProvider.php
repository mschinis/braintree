<?php namespace Mschinis\Braintree;

use \Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\Config;
use \Illuminate\Support\Facades\View;
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
        Braintree_Configuration::environment(Config::get('braintree::environment'));
        Braintree_Configuration::merchantId(Config::get('braintree::merchantId'));
        Braintree_Configuration::publicKey(Config::get('braintree::publicKey'));
        Braintree_Configuration::privateKey(Config::get('braintree::privateKey'));

        $encryptionKey = Config::get('braintree::clientSideEncryptionKey');

        $blade = View::getEngineResolver()->resolve('blade')->getCompiler();
        $blade->extend(function($value, $compiler) use($encryptionKey)
        {
            $matcher = "/(?<!\w)(\s*)@braintreeClientSideEncryptionKey/";

            return preg_replace($matcher, $encryptionKey, $value);
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
