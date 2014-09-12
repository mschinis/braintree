<?php

class BraintreeController extends \BaseController{
    public function postCheckout(){
        $paymentNonce = Input::get('payment_method_nonce');
        /* To learn more about transactions,
        check https://developers.braintreepayments.com/javascript+php/sdk/server/transaction-processing/create */
        $result = Braintree_Transaction::sale(array(
           'amount' => '10.00',
            'paymentMethodNonce' => $paymentNonce
        ));
        /* To find out more about error handling,
        check https://developers.braintreepayments.com/javascript+php/sdk/server/transaction-processing/result-handling */
        if($result->success){
            /* Transaction was a success */
            return 'Payment Succeeded';
        }else{
            /* Transaction did not succeed */
            $errors = $result->errors->deepAll();
            return 'Payment did not succeed with errors<br><pre>'.json_encode($errors);
        }
    }
    public function getTestPage(){
        /* To learn more about generating a token,
        check out https://developers.braintreepayments.com/javascript+php/sdk/overview/generate-client-token */
        $clientToken = Braintree_clientToken::generate();

        return View::make('braintreeTestView')->with(array('braintreeClientToken'=>$clientToken));
    }
}