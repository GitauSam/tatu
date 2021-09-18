{{-- dd($drivers[0]->user()) --}}
<x-dashboard-layout>
    <div class="home-content">
        <div class="bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden" style="margin: 3rem 3rem 0 3rem;">
            <div class="w-full lg:w-5/6">
                @if (session('success'))
                <div class="alert">
                    <!-- <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> -->
                    {{ session('success') }}
                </div>
                @endif

                @if(session('failed'))
                <div class="alert" style="background-color: red;">
                    {{ session('failed') }}
                </div>
                @endif
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center" style="text-align: center;">Registration Number</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Capacity</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Remaining Capacity</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Available</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Driver Status</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $driver->registration_number }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center text-center">
                                        <span style="margin: 0 auto;">{{ $driver->capacity }} Seats</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center text-center">
                                        <span style="margin: 0 auto;">{{ $driver->capacity - $paymentsCount }} Seats</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        @if($driver->available == 1)
                                        <span style="margin: 0 auto; background-color: green;" class="tatu-btn rounded-lg">Available</span>
                                        @else
                                        <span style="margin: 0 auto; background-color: red;" class="tatu-btn rounded-lg">N/A</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($driver->status == 1)
                                    <span style="margin: 0 auto; background-color: green;" class="tatu-btn rounded-lg">Active</span>
                                    @else
                                    <span style="margin: 0 auto; background-color: red;" class="tatu-btn rounded-lg">Disabled</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('driver-user.edit', $driver->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>