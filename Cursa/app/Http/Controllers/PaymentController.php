<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Paypal\Rest\ApiContext;
use Paypal\Auth\OAuthTokenCredential;

class PaymentController extends Controller{

    private $apiContext;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       $payPalConfig = Config::get('paypal');
        //https://github.com/paypal/PayPal-PHP-SDK/wiki/Making-First-Call
       // After Step 1
       $this -> apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'] ,     // ClientID
                $payPalConfig[ 'secret']   // ClientSecret
            )
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal(){

        return 123;
    }

    
}
