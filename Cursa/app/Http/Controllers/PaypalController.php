<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use PDF;


class PaypalController extends Controller
{

    public function Index()
    {
        return view('paypal.index');
    }

    public function RequestPayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $amount = $request->amount;

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paymentsuccess'),
                "cancel_url" => route('paymentCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "$amount"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('paymentindex')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('paymentindex')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function PaymentSuccess(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {


            return redirect()
                ->route('paymentindex')
                ->with('success','Transaction complete.');

        } else {
            return redirect()
                ->route('paymentindex')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function PaymentCancel()
    {
        return redirect()
            ->route('paymentindex')
            ->with('error', $response['message'] ?? 'You have cancelled the transaction.');
    }

    public function generatePDF(){

        $pdf = PDF::loadView('PaypalController.generatePDF', compact('success'));
        return $pdf->download('success.pdf');

    }
}
