<x-dashboard-layout>
    <div class="home-content">
        @if(auth()->user()->hasRole('user'))
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Bookings</div>
                    <div class="number">{{ $totalBookingsCount }}</div>
                    <div class="indicator">
                        <!-- <i class='bx bx-up-arrow-alt'></i> -->
                        <i class="fas fa-info"></i>
                        <span class="text">Total bookings count</span>
                    </div>
                </div>
                <i class='bx bx-cart-alt cart'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Payment</div>
                    <div class="number">KES {{ $totalPaymentAmount }}</div>
                    <div class="indicator">
                        <!-- <i class='bx bx-up-arrow-alt'></i> -->
                        <i class="fas fa-info"></i>
                        <span class="text">Total successful payments</span>
                    </div>
                </div>
                <i class='bx bxs-cart-add cart two'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Vehicles Available</div>
                    <div class="number">{{ $totalDriversCount }}</div>
                    <div class="indicator">
                        <!-- <i class='bx bx-up-arrow-alt'></i> -->
                        <i class="fas fa-info"></i>
                        <span class="text">Total number of available vehicles</span>
                    </div>
                </div>
                <i class='bx bx-cart cart three'></i>
            </div>
        </div>
        @endif

        @if(auth()->user()->hasRole('driver'))
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Payment</div>
                    <div class="number">KES {{ $totalPaymentAmount }}</div>
                    <div class="indicator">
                        <!-- <i class='bx bx-up-arrow-alt'></i> -->
                        <i class="fas fa-info"></i>
                        <span class="text">Total successful payments</span>
                    </div>
                </div>
                <i class='bx bxs-cart-add cart two'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Bookings</div>
                    <div class="number">{{ $totalBookingsCount }}</div>
                    <div class="indicator">
                        <!-- <i class='bx bx-up-arrow-alt'></i> -->
                        <i class="fas fa-info"></i>
                        <span class="text">Total bookings count</span>
                    </div>
                </div>
                <i class='bx bx-cart-alt cart'></i>
            </div>
            <!-- <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Vehicles Available</div>
                    <div class="number">{{-- $totalDriversCount --}}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i> -->
                        <!-- <i class="fas fa-info"></i>
                        <span class="text">Total number of available vehicles</span>
                    </div>
                </div>
                <i class='bx bx-cart cart three'></i> -->
            <!-- </div> -->
        </div>
        @endif

        @if(auth()->user()->hasRole('admin'))
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Bookings</div>
                    <div class="number">{{ $totalBookingsCount }}</div>
                    <div class="indicator">
                        <!-- <i class='bx bx-up-arrow-alt'></i> -->
                        <i class="fas fa-info"></i>
                        <span class="text">Total bookings count</span>
                    </div>
                </div>
                <i class='bx bx-cart-alt cart'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Payment</div>
                    <div class="number">KES {{ $totalPaymentAmount }}</div>
                    <div class="indicator">
                        <!-- <i class='bx bx-up-arrow-alt'></i> -->
                        <i class="fas fa-info"></i>
                        <span class="text">Total successful payments</span>
                    </div>
                </div>
                <i class='bx bxs-cart-add cart two'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Vehicles Available</div>
                    <div class="number">{{ $totalDriversCount }}</div>
                    <div class="indicator">
                        <!-- <i class='bx bx-up-arrow-alt'></i> -->
                        <i class="fas fa-info"></i>
                        <span class="text">Total number of available vehicles</span>
                    </div>
                </div>
                <i class='bx bx-cart cart three'></i>
            </div>
        </div>
        @endif

        @if(auth()->user()->hasRole('user'))
        <div class="sales-boxes">
            <div class="recent-sales box">
                <div class="title">Recent Payments</div>
                <div class="sales-details">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left" style="text-align: center;">Start Point</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Destination</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Vehicle</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Price</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Remarks</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Date Paid</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($bookings as $booking)
                            @foreach($booking->payments as $payment)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium" style="margin: 0 auto;">{{ $payment->route->start_point }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->route->destination }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->route->driver->registration_number }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center" style="text-align: center;">
                                        <span style="margin: 0 auto;">KES {{ $payment->route->price }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->mpesa_callback_result_desc }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center" style="text-align: center;">
                                        <span style="margin: 0 auto;">{{ $payment->updated_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="top-sales box">
                <div class="title">Booking</div>
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left" style="text-align: center;">Start Point</th>
                            <th class="py-3 px-6 text-left" style="text-align: center;">Destination</th>
                            <th class="py-3 px-6 text-center" style="text-align: center;">Price</th>
                            <th class="py-3 px-6 text-center" style="text-align: center;">Slots Remaining</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($bookings as $booking)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium" style="margin: 0 auto;">{{ $booking->route->start_point }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span style="margin: 0 auto;">{{ $booking->route->destination }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span style="margin: 0 auto;">KES {{ $booking->route->price }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left" style="text-align: center;">
                                <div class="flex items-center" style="text-align: center;">
                                    <span style="margin: 0 auto;">{{ $booking->route->driver->capacity - count($booking->payments) }} Seats</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if(auth()->user()->hasRole('driver'))
        <div class="sales-boxes">
            <div class="recent-sales box">
                <div class="title">Recent Payments</div>
                <div class="sales-details">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left" style="text-align: center;">Name</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Start Point</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Destination</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Vehicle</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Price</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Remarks</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Date Paid</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($bookings as $booking)
                            @foreach($booking->payments as $payment)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium" style="margin: 0 auto;">{{ $booking->user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium" style="margin: 0 auto;">{{ $payment->route->start_point }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->route->destination }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->route->driver->registration_number }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center" style="text-align: center;">
                                        <span style="margin: 0 auto;">KES {{ $payment->route->price }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->mpesa_callback_result_desc }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center" style="text-align: center;">
                                        <span style="margin: 0 auto;">{{ $payment->updated_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="top-sales box">
                <div class="title">Bookings</div>
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left" style="text-align: center;">Name</th>
                            <th class="py-3 px-6 text-left" style="text-align: center;">Start Point</th>
                            <th class="py-3 px-6 text-left" style="text-align: center;">Destination</th>
                            <th class="py-3 px-6 text-center" style="text-align: center;">Price</th>
                            <th class="py-3 px-6 text-center" style="text-align: center;">Slots Remaining</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($bookings as $booking)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium" style="margin: 0 auto;">{{ $booking->user->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium" style="margin: 0 auto;">{{ $booking->route->start_point }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span style="margin: 0 auto;">{{ $booking->route->destination }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span style="margin: 0 auto;">KES {{ $booking->route->price }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left" style="text-align: center;">
                                <div class="flex items-center" style="text-align: center;">
                                    <span style="margin: 0 auto;">{{ $booking->route->driver->capacity - count($booking->payments) }} Seats</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if(auth()->user()->hasRole('admin'))
        <div class="sales-boxes">
            <div class="recent-sales box">
                <div class="title">Recent Payments</div>
                <div class="sales-details">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left" style="text-align: center;">Name</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Start Point</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Destination</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Vehicle</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Price</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Remarks</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Date Paid</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($bookings as $booking)
                            @foreach($booking->payments as $payment)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium" style="margin: 0 auto;">{{ $booking->user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium" style="margin: 0 auto;">{{ $payment->route->start_point }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->route->destination }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->route->driver->registration_number }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center" style="text-align: center;">
                                        <span style="margin: 0 auto;">KES {{ $payment->route->price }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center" style="text-align: center;">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $payment->mpesa_callback_result_desc }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center" style="text-align: center;">
                                        <span style="margin: 0 auto;">{{ $payment->updated_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="top-sales box">
                <div class="title">Bookings</div>
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left" style="text-align: center;">Name</th>
                            <th class="py-3 px-6 text-left" style="text-align: center;">Start Point</th>
                            <th class="py-3 px-6 text-left" style="text-align: center;">Destination</th>
                            <th class="py-3 px-6 text-center" style="text-align: center;">Price</th>
                            <th class="py-3 px-6 text-center" style="text-align: center;">Slots Remaining</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($bookings as $booking)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium" style="margin: 0 auto;">{{ $booking->user->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium" style="margin: 0 auto;">{{ $booking->route->start_point }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span style="margin: 0 auto;">{{ $booking->route->destination }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span style="margin: 0 auto;">KES {{ $booking->route->price }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left" style="text-align: center;">
                                <div class="flex items-center" style="text-align: center;">
                                    <span style="margin: 0 auto;">{{ $booking->route->driver->capacity - count($booking->payments) }} Seats</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</x-dashboard-layout>