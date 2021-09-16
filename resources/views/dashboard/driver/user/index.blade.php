{{-- dd($drivers[0]->user()) --}}
<x-dashboard-layout>
    <div class="home-content">
        <div class="bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden" style="margin: 3rem 3rem 0 3rem;">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">Registration Number</th>
                                <th class="py-3 px-6 text-center">Capacity</th>
                                <th class="py-3 px-6 text-center">Available</th>
                                <th class="py-3 px-6 text-center">Driver Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($drivers as $driver)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center">
                                            <span style="margin: 0 auto;">{{ $driver->registration_number }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center text-center">
                                            <span style="margin: 0 auto;">{{ $driver->capacity }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span style="margin: 0 auto;">{{ $driver->available }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span style="margin: 0 auto;" class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $driver->status }}</span>
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
                            @endforeach
                        </tbody>
                    </table>
                    {{ $drivers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>