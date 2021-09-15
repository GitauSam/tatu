<x-dashboard-layout>
    <div class="home-content">
        <div class="bg-white flex px-80 items-center sales-boxes">
            <div class="w-full">
                <h2 class="text-center text-blue-400 font-bold text-2xl uppercase">ADD DRIVER</h2>
                <div class="bg-black p-10 rounded-lg shadow mx-auto">
                    <form action="" class="px-40 py-36">
                        <div class="mb-5">
                            <label for="name" class="block mb-2 font-bold text-gray-600">Name</label>
                            <input type="text" id="name" name="name" placeholder="Put in your fullname." required class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>

                        <div class="mb-5">
                            <label for="email" class="block mb-2 font-bold text-gray-600">Email</label>
                            <input type="email" id="email" name="email" placeholder="Put in your email." required class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>

                        <div class="mb-5">
                            <label for="phone_number" class="block mb-2 font-bold text-gray-600">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" placeholder="Put in your phone number." required class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>

                        <div class="mb-5">
                            <label for="id_number" class="block mb-2 font-bold text-gray-600">ID Number</label>
                            <input type="text" id="id_number" name="email" placeholder="Put in your id number." required class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>

                        <div class="mb-5">
                            <label for="registration_number" class="block mb-2 font-bold text-gray-600">Registration Number</label>
                            <input type="text" id="registration_number" name="registration_number" placeholder="Put in your registration number." required class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>

                        <div class="mb-5">
                            <label for="capacity" class="block mb-2 font-bold text-gray-600">Capacity</label>
                            <input type="text" id="capacity" name="capacity" placeholder="Put in your vehicle's capacity." required class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>

                        <div class="mb-5">
                            <label for="password" class="block mb-2 font-bold text-gray-600">Password</label>
                            <input type="password" id="password" name="password" placeholder="Put in your password." required class="border border-gray-300 shadow p-3 w-full rounded">
                        </div>
                        <div class="mb-5">
                            <button class="block bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>