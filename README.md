Braintree Package for Laravel 4.2
==============

### Installation

In your Laravel project's composer.json file, add `braintree` as a dependency in the require object:

```js
"mschinis/braintree": "dev-master"
```

Use `composer update` for composer to update the dependencies and download the package.

Once installed, add the ServiceProvider to your provider array within `app/config/app.php`:

```php
'providers' => array(

    'Mschinis\Braintree\BraintreeServiceProvider'

)
```

### Configuration

To publish the configuration file, run:

```shell
php artisan config:publish mschinis/braintree
```

Then open `app/config/packages/mschinis/braintree/config.php` to setup your environment and keys:
Acceptable environment values are `sandbox` or `production`.
All required keys can be found by logging in to your [sandbox](https://sandbox.braintreegateway.com/login) or [production](https://www.braintreegateway.com/login) account


```php
<?php

return array(
    'environment'   => 'sandbox',
    'merchantId'    => 'use_your_merchant_id',
    'publicKey'     => 'use_your_public_key',
    'privateKey'    => 'use_your_private_key',
    'CSEKey'        => 'use_your_client_side_encryption_key'
);
```

You can setup different environmental configurations by creating matching folders inside the `app/config/packages/mschinis/braintree` directory. For instance, if you have a `local` environment, create a config file at `app/config/packages/mschinis/braintree/local/config.php` for that environment.

### Example
You can use the artisan command `php artisan braintree:example` to generate a boilerplate controller that will handle an example payment and an example view with a payment form.

After you generate the files, make sure you add the controller to your routes: `Route::controller('braintree', "BraintreeController");`.

Once the steps above are completed, you can access the test page at `/braintree/test-page`

### Usage

Once setup, you can use the Braintree PHP classes as spelled out in the [documentation](https://developers.braintreepayments.com/javascript+php/start/overview).

Links to essential information:
 * [Generating Client Tokens](https://developers.braintreepayments.com/javascript+php/sdk/overview/generate-client-token)
 * [Drop-in UI](https://developers.braintreepayments.com/javascript+php/start/hello-client)
 * [Transactions](https://developers.braintreepayments.com/javascript+php/sdk/server/transaction-processing/create)
 * [Result & Error Handling](https://developers.braintreepayments.com/javascript+php/sdk/server/transaction-processing/result-handling)

