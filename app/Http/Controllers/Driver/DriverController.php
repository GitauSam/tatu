<?php

namespace App\Http\Controllers\Driver;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\Driver\Driver;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DriverController extends Controller
{

    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::paginate(10);

        return view('dashboard.driver.index', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string','min:12', 'max:12', 'unique:users'],
            'id_number' => ['required', 'string','min:5', 'max:18'],
            'registration_number' => ['required', 'string','min:7', 'max:8'],
            'capacity' => ['required', 'string','min:1', 'max:3`'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'status' => 1,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('driver');

        Driver::create([
            'user_id' => $user->id,
            'id_number' => $request->id_number,
            'registration_number' => $request->registration_number,
            'capacity' => $request->capacity,
            'available' => 1,
            'status' => 1
        ]);

        return redirect()->route('driver.index')->with('Driver created successfully');
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

        return view('dashboard.driver.edit', ["driver" => $driver]);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'string','min:12', 'max:12'],
            'id_number' => ['required', 'string','min:5', 'max:18'],
            'registration_number' => ['required', 'string','min:7', 'max:8'],
            'capacity' => ['required', 'string','min:1', 'max:3`'],
        ])->validate();

        $driver = Driver::find($id);

        $user = User::find($driver->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        $user->save();

        $user->assignRole('driver');

        $driver->id_number = $request->id_number;
        $driver->registration_number = $request->registration_number;
        $driver->capacity = $request->capacity;

        $driver->save();

        return redirect()->route('driver.index')->with('Driver updated successfully');
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
