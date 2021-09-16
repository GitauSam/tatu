<?php

namespace App\Http\Integrations;

use App\Exceptions\General\CouldNotGetCurrentTimeException;
use App\Exceptions\Mpesa\CouldNotGenerateAccessTokenException;
use App\Exceptions\Mpesa\CouldNotGeneratePasswordException;
use App\Exceptions\Mpesa\InvalidAmountException;
use App\Models\Payments\Payment;
use App\Modules\Utils\Utils;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LipaNaMpesa 
{

    use Utils;

    public function pay($amount, $accountReference, $route_id, $booking_id) 
    {
        $transactionStatus = '20';
        Log::debug("breakpoint 1");

        // try 
        // {
            $payment = new Payment();

            Log::debug("breakpoint 2");
            
            if ($amount < 1) 
            {
                Log::debug("breakpoint 3");
                Log::debug("Mpesa amount to be paid is invalid. Amount: " . $amount);

                throw new InvalidAmountException("Amount payable should be greater than KES 1. Current input: KES " . $amount . "."); 
            
            } 
            else 
            {
                Log::debug("breakpoint 4");
                Log::debug("Mpesa amount to be paid is valid. Amount: " . $amount);

            }

            Log::debug("breakpoint 5");

            $paybillNo = 174379;

            Log::debug("breakpoint 6");

            $currentTime = $this->getCurrentDate();

            Log::debug("breakpoint 7");

            if (!$currentTime) 
            {
                Log::debug("breakpoint 8");

                throw new CouldNotGetCurrentTimeException("Unable to get current timestamp for use in mpesa payload.");

            }

            Log::debug("breakpoint 9");

            $password = $this->returnEncodedValue
                                            (
                                                'base64', 
                                                array(
                                                    $paybillNo,
                                                    "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919",
                                                    $currentTime
                                                )
                                            );

            
            Log::debug("breakpoint 10");

            if (!$password) 
            {

                Log::debug("breakpoint 11");

                throw new CouldNotGeneratePasswordException("Unable to generate mpesa password.");

            }

            Log::debug("breakpoint 12");

            $token = MpesaOauthToken::getToken();

            Log::debug("Token: " . $token);
            
            Log::debug("breakpoint 13");

            if (!$token) 
            {

                Log::debug("breakpoint 14");

                throw new CouldNotGenerateAccessTokenException("Unable to generate mpesa access token.");

            }

            Log::debug("breakpoint 15");
            Log::debug("Phone No: " . auth()->user()->phone_number);

            $transactionDesc = substr(md5(time()), 0, 16);

            $request_array = [
                'BusinessShortCode' => $paybillNo,
                'Password' => $password,
                'Timestamp' => $currentTime,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => auth()->user()->phone_number,
                'PartyB' => $paybillNo,
                'PhoneNumber' => auth()->user()->phone_number,
                'CallBackURL' => 'https://4695-41-139-130-105.ngrok.io/api/spush/cb',
                'AccountReference' => '495632184',
                'TransactionDesc' => $transactionDesc
            ];

            $payment->transaction_amount = $amount;
            $payment->user_id = auth()->user()->id;
            $payment->mpesa_oauth_token = $token;
            $payment->business_short_code = $paybillNo;
            $payment->mpesa_password = $password;
            $payment->mpesa_password_status = '0';
            $payment->mpesa_request_timestamp = $currentTime;
            $payment->mpesa_request_timestamp_status = '0';
            $payment->mpesa_party_a = auth()->user()->phone_number;
            $payment->mpesa_party_b = $paybillNo;
            $payment->mpesa_transaction_type = 'CustomerPayBillOnline';
            $payment->mpesa_sender_msisdn = auth()->user()->phone_number;
            $payment->mpesa_account_ref = '495632184';
            $payment->mpesa_transaction_desc = $transactionDesc;
            $payment->mpesa_integration_request = json_encode($request_array);
            $payment->route_id = $route_id;
            $payment->booking_id = $booking_id;
            $payment->save();

                            
            Log::debug("Mpesa request: " . json_encode($request_array));

            $response = Http::withToken($token)
                            ->post(
                                'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest', 
                                $request_array
                            );

            Log::debug("breakpoint 19");

            Log::debug("Response: " . json_encode($response));

            if ($response == null || empty($response) ) 
            {

                Log::debug('Lipa na mpesa response is empty');

            } 
            else if ($response['ResponseCode'] != '0') 
            {

                Log::debug("Lipa na mpesa transaction failed");
                Log::debug("Merchant request id: " . $response['MerchantRequestID']);
                Log::debug("Checkout request id: " . $response['CheckoutRequestID']);
                Log::debug("Mpesa response code: " . $response['ResponseCode']);
                Log::debug("Mpesa response description: " . $response['ResponseDescription']);
                Log::debug("Mpesa customer message: " . $response['CustomerMessage']);
                Log::debug("Mpesa response body: " . $response->body());

                $payment->mpesa_merchant_response_id = $response['MerchantRequestID'];
                $payment->mpesa_checkout_response_id = $response['CheckoutRequestID'];
                $payment->mpesa_response_code = $response['ResponseCode'];
                $payment->mpesa_response_description = $response['ResponseDescription'];
                $payment->mpesa_customer_message = $response['CustomerMessage'];
                $payment->mpesa_integration_response = $response->body();
                $payment->save();

            } 
            else 
            {
            
                Log::debug("Lipa na mpesa transaction successfully completed");
                Log::debug("Merchant request id: " . $response['MerchantRequestID']);
                Log::debug("Checkout request id: " . $response['CheckoutRequestID']);
                Log::debug("Mpesa response code: " . $response['ResponseCode']);
                Log::debug("Mpesa response description: " . $response['ResponseDescription']);
                Log::debug("Mpesa customer message: " . $response['CustomerMessage']);
                Log::debug("Mpesa response body: " . $response->body());

                $payment->mpesa_merchant_response_id = $response['MerchantRequestID'];
                $payment->mpesa_checkout_response_id = $response['CheckoutRequestID'];
                $payment->mpesa_response_code = $response['ResponseCode'];
                $payment->mpesa_response_description = $response['ResponseDescription'];
                $payment->mpesa_customer_message = $response['CustomerMessage'];
                $payment->mpesa_integration_response = $response->body();
                $payment->save();

                $transactionStatus = '30';
            
            }

            Log::debug("breakpoint 16");

        // } 
        // catch (\Exception $e) 
        // {
        //     Log::debug("breakpoint 17");

        //     Log::debug('Unable to complete lipa na mpesa transaction. Error: ' . json_encode($e) . ".");

        // }

        Log::debug("breakpoint 18");

        return $transactionStatus;

    }
}