{{-- dd($payments) --}}
<x-dashboard-layout>
<style>
        .tatu-btn {
            pointer-events: auto;
            cursor: pointer;
            background: #e7e7e7;
            border: none;
            padding: .5rem 1rem;
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            position: relative;
            display: inline-block;
            background-color: #0A2558;
            color: #fff;
        }

        .tatu-btn::before,
        .tatu-btn::after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .tatu-btn--janus {
            font-family: freight-display-pro, serif;
            font-weight: 900;
            width: 175px;
            height: 120px;
            color: #fff;
            background: none;
        }

        .tatu-btn--janus::before {
            content: '';
            background: #e6e6e6;
            -webkit-clip-path: path("M154.5,88.5 C131,113.5 62.5,110 30,89.5 C-2.5,69 -3.5,42 4.5,25.5 C12.5,9 33.5,-6 85,3.5 C136.5,13 178,63.5 154.5,88.5 Z");
            clip-path: path("M154.5,88.5 C131,113.5 62.5,110 30,89.5 C-2.5,69 -3.5,42 4.5,25.5 C12.5,9 33.5,-6 85,3.5 C136.5,13 178,63.5 154.5,88.5 Z");
            transition: clip-path 0.5s cubic-bezier(0.585, 2.5, 0.645, 0.55), -webkit-clip-path 0.5s cubic-bezier(0.585, 2.5, 0.645, 0.55), background 0.5s ease;
        }

        .tatu-btn--janus:hover::before {
            background: #000;
            -webkit-clip-path: path("M143,77 C117,96 74,100.5 45.5,91.5 C17,82.5 -10.5,57 5.5,31.5 C21.5,6 79,-5.5 130.5,4 C182,13.5 169,58 143,77 Z");
            clip-path: path("M143,77 C117,96 74,100.5 45.5,91.5 C17,82.5 -10.5,57 5.5,31.5 C21.5,6 79,-5.5 130.5,4 C182,13.5 169,58 143,77 Z");
        }

        .tatu-btn--janus::after {
            content: '';
            height: 86%;
            width: 97%;
            top: 5%;
            border-radius: 58% 42% 55% 45% / 56% 45% 55% 44%;
            border: 1px solid #000;
            transform: rotate(-20deg);
            z-index: -1;
            transition: transform 0.5s cubic-bezier(0.585, 2.5, 0.645, 0.55);
        }

        .tatu-btn--janus:hover::after {
            transform: translate3d(0, -5px, 0);
        }

        .tatu-btn--janus span {
            display: block;
            transition: transform 0.3s ease;
            mix-blend-mode: difference;
        }

        .tatu-btn--janus:hover span {
            transform: translate3d(0, -10px, 0);
        }
    </style>
    <div class="home-content">
        <div class="bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden" style="margin: 3rem 3rem 0 3rem;">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
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
                            @foreach($payments as $payment)
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
                                            @if($payment->mpesa_callback_result_code == 0)
                                                <span style="margin: 0 auto; background-color: green;" class="tatu-btn rounded-lg">{{ $payment->mpesa_callback_result_desc }}</span>
                                            @else
                                                <span style="margin: 0 auto; background-color: red;" class="tatu-btn rounded-lg">{{ $payment->mpesa_callback_result_desc }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center" style="text-align: center;">
                                            <span style="margin: 0 auto;">{{ $payment->updated_at }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- $payments->links() --}}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>