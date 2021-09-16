<?php

namespace App\Http\Integrations;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaOauthToken{
    public static function getToken() {

        try {

            $token = Http::withBasicAuth
                            (
                                "HN2r3MJYWsv2AcChas3XgiPplWKiyAh4", 
                                "AIe4UmUGtQUtTEGz"
                            )
                            ->get("https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials")
                            ->json()['access_token'];

            Log::debug("Requested mpesa token successfully");

            return $token;

        } catch (\Exception $e) {

            Log::debug("Exception occurred while requesting mpesa token");
            Log::debug("Cause: " . $e->getMessage());

            return 0;

        }

    }
}