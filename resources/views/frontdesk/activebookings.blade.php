<x-app-layout>
    @section('title', 'Active Bookings')
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Active Bookings</span>
        </li>
    </ul>

    <div class="panel mt-6">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Room Details</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Status</th>
                        <th class="text-center">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($active_bookings as $bookings)
                        <tr>
                            <td>{{ $bookings->userInfo->name }}</td>
                            <td>{{ $bookings->userInfo->email }}</td>
                            <td>{{ $bookings->contact_no }}</td>
                            <td>{{ $bookings->room_type }} {{ $bookings->room_number }}</td>
                            <td>{{ $bookings->checkin }}</td>
                            <td>{{ $bookings->checkout }}</td>
                            <td>
                                @if ($bookings->status == 'Active')
                                    <span class="badge bg-success">{{ $bookings->status }}</span>
                                    @else
                                    <span class="badge bg-warning">{{ $bookings->status}}</span>
                                @endif
                            </td>
                            <td class="flex">
                                <button data-hs-overlay="#booking{{ $bookings->id }}" class="btn btn-primary"
                                    type="button">
                                    View Details
                                </button>
                                <div id="booking{{ $bookings->id }}"
                                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                    <div
                                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-5xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
                                        <div
                                            class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                            <div
                                                class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                <h3 class="font-bold text-gray-800 dark:text-white">
                                                    {{ $bookings->userInfo->name }}'s Information
                                                </h3>
                                                <button type="button"
                                                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                    data-hs-overlay="#booking{{ $bookings->id }}">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18" />
                                                        <path d="m6 6 12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-4 overflow-y-auto">
                                                <div class="table-responsive">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Adults</th>
                                                                <th>Childs</th>
                                                                <th>Client Password</th>
                                                                <th>Guest's ID</th>
                                                                <th>ID Number</th>
                                                                <th>Stay</th>
                                                                <th>Room Services</th>
                                                                <th>Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td>{{ $bookings->adult_no }}</td>
                                                                <td>{{ $bookings->child_no }}</td>
                                                                <td>{{ $bookings->client_password }}</td>
                                                                <td>{{ $bookings->guest_id }}</td>
                                                                <td>{{ $bookings->id_number }}</td>
                                                                <td>{{ $bookings->per_stay }} hours</td>
                                                                <td>
                                                                    @foreach (json_decode($bookings->room_service) as $service)
                                                                        {{ $service }},
                                                                    @endforeach
                                                                </td>
                                                                <td><i class="fa-solid fa-peso-sign"></i>
                                                                    {{ number_format($bookings->price) }}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div
                                                class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                <button type="button"
                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                    data-hs-overlay="#booking{{ $bookings->id }}">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($bookings->status == 'Active')
                                <div class="text-center">
                                    <button type="button"
                                        class="btn btn-warning ml-4"
                                        data-hs-overlay="#hs-sign-out-alert">
                                        Checkout
                                    </button>
                                </div>
                                @endif

                                <div id="hs-sign-out-alert"
                                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                                    <div
                                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                        <div
                                            class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                                            <div class="absolute top-2 end-2">
                                                <button type="button"
                                                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                    data-hs-overlay="#hs-sign-out-alert">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18" />
                                                        <path d="m6 6 12 12" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="p-4 sm:p-10 text-center overflow-y-auto">
                                                <!-- Icon -->
                                                <span
                                                    class="mb-4 inline-flex justify-center items-center size-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
                                                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                </span>
                                                <!-- End Icon -->

                                                <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200">
                                                    Checkout
                                                </h3>
                                                <p class="text-gray-500">
                                                    Are you sure you would like to checkout {{$bookings->userInfo->name}} from Room {{ $bookings->room_type }} {{ $bookings->room_number }}
                                                </p>

                                                <div class="mt-6 flex justify-center gap-x-4">
                                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        href="{{ url('checkout-guest/'.$bookings->id)}}">
                                                        Checkout
                                                    </a>
                                                    <button type="button"
                                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        data-hs-overlay="#hs-sign-out-alert">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>No Current Bookings</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const links = document.querySelectorAll('.link');
        links.forEach(link => {
            link.addEventListener('click', function() {
                // Remove underline from all links
                links.forEach(l => l.classList.remove('underline'));
                // Add underline to the clicked link
                this.classList.add('underline');
            });
        });
    </script>
</x-app-layout>
