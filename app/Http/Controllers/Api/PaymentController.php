<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Controllers\Controller;


class PaymentController extends Controller
{

    public function createTransaction(Request $request)
    {

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => '7kfb5d3sq8xwt3tr',
            'publicKey' => 'j3xdzwpmvddjt8y6',
            'privateKey' => 'c481afae58bdbc0b043ec521e448ac1b'
        ]);

        try {
            $result = $gateway->transaction()->sale([
                'amount' => $request->amount,
                'paymentMethodNonce' => $request->nonce,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);
    
            if ($result->success) {
                // Transaction was successful
                $transactionId = $result->transaction->id;
                // You can store the transaction ID or perform other actions here
                return response()->json(['success' => true, 'transactionId' => $transactionId]);
            }
             else {
                // Transaction failed
                $errorMessage = 'ciao';
                return response()->json(['success' => false, 'message' => $errorMessage], 500);
            }
        } 
        catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
