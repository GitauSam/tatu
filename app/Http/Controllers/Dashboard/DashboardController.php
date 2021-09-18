<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use App\Models\Driver\Driver;
use App\Models\Driver\Route;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalBookingsCount = 0;
        $totalPaymentAmount = 0;

        if (auth()->user()->hasRole('user')) {
            $bookings = Booking::where('user_id', auth()->user()->id)->where('status', 1)->get();
            $totalBookingsCount = $bookings->count();
            $totalPaymentAmount = 0;

            // dd($bookings->get()[0]->payments);
            foreach($bookings as $booking) {
                foreach($booking->payments as $payment) {
                    if ($payment->paid == 1) {
                        $totalPaymentAmount += $payment->transaction_amount;
                    }
                }
            }

            $drivers = Driver::where('available', 1)->where('status', 1)->get();

            return view(
                'dashboard.dashboard', 
                [
                    'totalBookingsCount' => $totalBookingsCount, 
                    'totalPaymentAmount' => $totalPaymentAmount,
                    'totalDriversCount' => $drivers->count(),
                    'bookings' => $bookings
                ]);
        } else if (auth()->user()->hasRole('driver')) {
            $route = Route::where('status', 1)->where('driver_id', 1)->first();

            if (Route::where('status', 1)->where('driver_id', 1)->count() == 0) {
                return view(
                    'dashboard.dashboard', 
                    [
                        'totalBookingsCount' => 0, 
                        'totalPaymentAmount' => 0,
                        'bookings' => []
                    ]);
            }
            // $routeId = $route->id;
            $bookings = Booking::where('route_id', $route->id)
                                ->where('status', 1)
                                ->get();
                                // ->where('payments', function($p) use ($routeId) {});
            $totalBookingsCount = $bookings->count();
            $totalPaymentAmount = 0;

            // dd($bookings->get()[0]->payments);
            foreach($bookings as $booking) {
                foreach($booking->payments as $payment) {
                    if ($payment->paid == 1) {
                        $totalPaymentAmount += $payment->transaction_amount;
                    }
                }
            }

            return view(
                'dashboard.dashboard', 
                [
                    'totalBookingsCount' => $totalBookingsCount, 
                    'totalPaymentAmount' => $totalPaymentAmount,
                    'bookings' => $bookings
                ]);
        } else if (auth()->user()->hasRole('admin')) {
            $bookings = Booking::where('status', 1)->get();
            $totalBookingsCount = $bookings->count();
            $totalPaymentAmount = 0;

            // dd($bookings->get()[0]->payments);
            foreach($bookings as $booking) {
                foreach($booking->payments as $payment) {
                    if ($payment->paid == 1) {
                        $totalPaymentAmount += $payment->transaction_amount;
                    }
                }
            }

            $drivers = Driver::where('status', 1)->get();

            return view(
                'dashboard.dashboard', 
                [
                    'totalBookingsCount' => $totalBookingsCount, 
                    'totalPaymentAmount' => $totalPaymentAmount,
                    'totalDriversCount' => $drivers->count(),
                    'bookings' => $bookings
                ]);
        } 
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
        //
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
