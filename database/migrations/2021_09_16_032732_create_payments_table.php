<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('business_short_code')->nullable();
            $table->string('mpesa_oauth_token')->nullable();
            $table->string('mpesa_oauth_token_status')->nullable();
            $table->string('mpesa_password')->nullable();
            $table->string('mpesa_password_status')->nullable();
            $table->string('mpesa_request_timestamp')->nullable();
            $table->string('mpesa_request_timestamp_status')->nullable();
            $table->string('mpesa_transaction_type')->nullable();
            $table->string('transaction_amount')->nullable();
            $table->string('mpesa_party_a')->nullable();
            $table->string('mpesa_party_b')->nullable();
            $table->string('mpesa_sender_msisdn')->nullable();
            $table->string('mpesa_account_ref')->nullable();
            $table->string('mpesa_transaction_desc')->nullable();
            $table->text('mpesa_integration_request')->nullable();
            $table->string('mpesa_merchant_response_id')->nullable();
            $table->string('mpesa_checkout_response_id')->nullable();
            $table->string('mpesa_response_code')->nullable();
            $table->string('mpesa_response_description')->nullable();
            $table->string('mpesa_customer_message')->nullable();
            $table->text('mpesa_integration_response')->nullable();
            $table->string('mpesa_callback_merchant_response_id')->nullable();
            $table->string('mpesa_callback_checkout_response_id')->nullable();
            $table->string('mpesa_callback_result_code')->nullable();
            $table->string('mpesa_callback_result_desc')->nullable();
            $table->text('mpesa_callback_response')->nullable();
            $table->string('mpesa_callback_response_status')->nullable();
            $table->string('mpesa_callback_response_amount')->nullable();
            $table->string('mpesa_callback_response_receipt_number')->nullable();
            $table->string('mpesa_callback_response_transaction_date')->nullable();
            $table->string('mpesa_callback_response_phone_number')->nullable();
            $table->tinyInteger('paid')->nullable()->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('route_id')->nullable();
            $table->foreign('route_id')->references('id')->on('routes');
            $table->string('transaction_status')->nullable();
            $table->text('transaction_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
