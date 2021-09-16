<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Http\Integrations\LipaNaMpesa;
use App\Models\Driver\Route;
use App\Models\Payments\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('id', '>', 0)->get();

        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $payments = Payment::all();
        } else if ($user->hasRole('driver')) {
            foreach ($payments as $payment) {
                if ($payment->route->driver->user->id == auth()->user()->id) {
                    array_push($payments, $payment);
                }
            }
        } else {
            foreach ($payments as $payment) {
                if ($payment->route->driver->user->id == auth()->user()->id) {
                    array_push($payments, $payment);
                }
            }
        }

        return view('dashboard.payments.index', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $lipaNaMpesa = new LipaNaMpesa();

            $route = Route::find($request->route_id);
            
            if ($lipaNaMpesa->pay($route->price, '495632184', $route->id, $request->booking_id) == '30') {
                return redirect()->route('booking.index')->with("Payment confirmed");
            }

        } catch (\Exception $e) {
            Log::debug("Exception occurred when attempting to pay with mpesa");
            Log::debug("Cause: " . $e->getMessage());
            return redirect()->route('booking.index')->with("Unable to confirm payment");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
