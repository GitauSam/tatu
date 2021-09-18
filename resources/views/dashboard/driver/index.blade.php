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
                <x-jet-validation-errors class="mb-4" />
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left" style="text-align: center;">Name</th>
                                <th class="py-3 px-6 text-left" style="text-align: center;">Email</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Phone Number</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">ID Number</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">User Status</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Registration Number</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Capacity</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Available</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Driver Status</th>
                                <th class="py-3 px-6 text-center" style="text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($drivers as $driver)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium" style="margin: 0 auto;">{{ $driver->user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $driver->user->email }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $driver->user->phone_number }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $driver->id_number }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($driver->user->status == 1)
                                    <span style="margin: 0 auto; background-color: green;" class="rounded-lg tatu-btn">Active</span>
                                    @else
                                    <span style="margin: 0 auto; background-color: red;" class="rounded-lg tatu-btn">Disabled</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $driver->registration_number }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span style="margin: 0 auto;">{{ $driver->capacity }} Seats</span>
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
                                    <span style="margin: 0 auto; background-color: green;" class="rounded-lg tatu-btn">Active</span>
                                    @else
                                    <span style="margin: 0 auto; background-color: red;" class="rounded-lg tatu-btn">Disabled</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('driver.edit', $driver->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $drivers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>