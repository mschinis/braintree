<?php

class BraintreeController extends \BaseController{
    public function checkout(){
        $paymentNonce = Input::get('payment_method_nonce');

        return $paymentNonce;
    }
}