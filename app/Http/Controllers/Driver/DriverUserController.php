<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver\Driver;
use App\Models\Driver\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DriverUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::where('user_id', '=', auth()->user()->id)->first();

        $route = Route::where('driver_id', $driver->id)->where('status', 1)->first();

        $paymentsCount = 0;

        if (Route::where('driver_id', $driver->id)->where('status', 1)->count() > 0) {
            foreach($route->bookings as $booking) {
                foreach($booking->payments as $payment) {
                    if ($payment->paid == 1) {
                        $paymentsCount++;
                    }
                }
            }
        }

        return view('dashboard.driver.user.index', ['driver' => $driver, 'paymentsCount' => $paymentsCount]);
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
        $driver = Driver::find($id);
        $route = Route::where('driver_id', '=', $id)->get();

        return view('dashboard.driver.user.edit', ['driver' => $driver, 'route' => $route]);
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

        Validator::make($request->all(), [
            'start_point' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string','min:1', 'max:6'],
        ])->validate();
        
        $driver = Driver::find($id);
        $driver->available = $request->available ? 1 : 0;
        $driver->save();

        if (Route::where('driver_id', '=', $driver->id)->exists()) {
            
            $route = Route::where('driver_id', '=', $driver->id)->first();

            $route->driver_id = $driver->id;
            $route->start_point = $request->start_point;
            $route->destination = $request->destination;
            $route->price = $request->price;
            $route->status = 1;
            $route->save();

        } else {

            Route::create([
                "driver_id" => $driver->id,
                "start_point" => $request->start_point,
                "destination" => $request->destination,
                "price" => $request->price,
                "status" => 1,
            ]);

        }

        return redirect()->route('driver-user.index')->with("success", "Vehicle details saved successfully");
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
