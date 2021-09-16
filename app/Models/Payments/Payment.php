<?php

namespace App\Models\Payments;

use App\Models\Driver\Route;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "business_short_code", // p
        "mpesa_oauth_token", // p
        "mpesa_password", // p
        'mpesa_password_status', //p
        'mpesa_request_timestamp', //p
        'mpesa_request_timestamp_status', //p
        'mpesa_transaction_type', // p
        'transaction_amount', // p
        'mpesa_party_a', // p
        'mpesa_party_b', // p
        'mpesa_sender_msisdn', // p
        'mpesa_account_ref', // p
        'mpesa_transaction_desc', // p
        'mpesa_integration_request', // p
        'mpesa_merchant_response_id',
        'mpesa_checkout_response_id',
        'mpesa_response_code',
        'mpesa_response_description',
        'mpesa_customer_message',
        'mpesa_integration_response',
        'mpesa_callback_merchant_response_id',
        'mpesa_callback_checkout_response_id',
        'mpesa_callback_result_code',
        'mpesa_callback_result_desc',
        'mpesa_callback_response',
        'mpesa_callback_response_status',
        'mpesa_callback_response_amount',
        'mpesa_callback_response_receipt_number',
        'mpesa_callback_response_transaction_date',
        'mpesa_callback_response_phone_number',
        'route_id', // p
        'user_id', // p
        'paid'
    ];

    public function route() {
        return $this->belongsTo(Route::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
