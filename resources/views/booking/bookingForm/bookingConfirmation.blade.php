<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Booking Confirmation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <body class="bg-gray-50 dark:bg-slate-900">
        <!-- Invoice -->
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
            <div class="sm:w-11/12 lg:w-3/4 mx-auto">
                <!-- Card -->
                <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-gray-800">
                    <!-- Grid -->
                    <div class="flex justify-between">
                        <div>
                            <img src="{{ asset('assets/images/anaa.png') }}" alt="" class="w-[20vh]">
                        </div>
                        <!-- Col -->

                        <div class="text-end">
                            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-200">Booking
                                Confirmation
                            </h2>

                            <div class="mt-4 not-italic text-gray-800 dark:text-gray-200">

                            </div>
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- End Grid -->

                    <!-- Grid -->
                    <div class="mt-8 grid sm:grid-cols-2 gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Bill to:</h3>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $request['firstname'] }} {{ $request['lastname'] }}</h3>
                            <div class="mt-2 not-italic text-gray-500">
                                <p>{{ $request['contact'] }}</p>
                                <p>{{ $request['email'] }}</p>
                            </div>
                        </div>
                        <!-- Col -->

                        <div class="sm:text-end space-y-2">
                            <!-- Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Start date:
                                    </dt>
                                    <dd class="col-span-2 text-gray-500">{{ $request->input('start') }}</dd>
                                </dl>
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">End Date:</dt>
                                    <dd class="col-span-2 text-gray-500">{{ $request['end'] }}</dd>
                                </dl>
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Duration:</dt>
                                    <dd class="col-span-2 text-gray-500">{{ $request['duration'] }}</dd>
                                </dl>
                            </div>
                            <!-- End Grid -->
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- End Grid -->

                    <!-- Table -->
                    <div class="mt-6">
                        <div class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
                            <div class="hidden sm:grid sm:grid-cols-5">
                                <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Room Type</div>
                                <div class="text-start text-xs font-medium text-gray-500 uppercase">Room Number</div>
                                <div class="text-end text-xs font-medium text-gray-500 uppercase">Amount</div>
                            </div>

                            <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>

                            <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                                <div class="col-span-full sm:col-span-2">
                                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Room Type</h5>
                                    <p class="font-medium text-gray-800 dark:text-gray-200">{{ $request['room_type'] }}
                                    </p>
                                </div>
                                <div>
                                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Room Number</h5>
                                    <p class="text-gray-800 dark:text-gray-200">{{ $request['room_no'] }}</p>
                                </div>
                                <div id="priceElement">
                                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                                    <p class="sm:text-end text-gray-800 dark:text-gray-200"><i
                                            class="fa-solid fa-peso-sign"></i> <span
                                            id="priceDisplay">{{ number_format($request['price']) }}</span></p>

                                </div>
                                <div>
                                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Loyalty Awards
                                    </h5>
                                    @auth
                                    @if ($user->vip == 'Yes')
                                        <div class="flex justify-end">
                                            <button type="button"
                                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                data-hs-overlay="#hs-large-modal">
                                                Vouchers
                                            </button>
                                        </div>

                                    @endif
                                    @endauth

                                    <div id="hs-large-modal"
                                        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                        <div
                                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                                            <div
                                                class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                <div
                                                    class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                    <h3 class="font-bold text-gray-800 dark:text-white">
                                                        Loyalty Vouchers
                                                    </h3>
                                                    <button type="button"
                                                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        data-hs-overlay="#hs-large-modal">
                                                        <span class="sr-only">Close</span>
                                                        <svg class="flex-shrink-0 size-4"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M18 6 6 18" />
                                                            <path d="m6 6 12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="p-4 overflow-y-auto">
                                                    <!-- Stats -->
                                                    <div class="flex flex-col items-center justify-center">
                                                        <h4
                                                            class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-gray-200">
                                                            Loyalty Points
                                                        </h4>
                                                        @auth
                                                        <p
                                                            class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-blue-600">
                                                            {{ $user->points }}</p>
                                                            @endauth
                                                    </div>
                                                    <!-- Card Blog -->
                                                    <div
                                                        class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                                                        <!-- Grid -->
                                                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                                            <!-- Card -->
                                                            <div
                                                                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                                <div
                                                                    class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                                                                    <svg class="size-28" width="56" height="56"
                                                                        viewBox="0 0 56 56" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="56" height="56"
                                                                            rx="10" fill="white" />
                                                                        <path
                                                                            d="M20.2819 26.7478C20.1304 26.5495 19.9068 26.4194 19.6599 26.386C19.4131 26.3527 19.1631 26.4188 18.9647 26.5698C18.848 26.6622 18.7538 26.78 18.6894 26.9144L10.6019 43.1439C10.4874 43.3739 10.4686 43.6401 10.5496 43.884C10.6307 44.1279 10.805 44.3295 11.0342 44.4446C11.1681 44.5126 11.3163 44.5478 11.4664 44.5473H22.7343C22.9148 44.5519 23.0927 44.5037 23.2462 44.4084C23.3998 44.3132 23.5223 44.1751 23.5988 44.011C26.0307 38.9724 24.5566 31.3118 20.2819 26.7478Z"
                                                                            fill="url(#paint0_linear_2204_541)" />
                                                                        <path
                                                                            d="M28.2171 11.9791C26.201 15.0912 25.026 18.6755 24.8074 22.3805C24.5889 26.0854 25.3342 29.7837 26.9704 33.1126L32.403 44.0113C32.4833 44.1724 32.6067 44.3079 32.7593 44.4026C32.912 44.4973 33.088 44.5475 33.2675 44.5476H44.5331C44.6602 44.5479 44.7861 44.523 44.9035 44.4743C45.0209 44.4257 45.1276 44.3543 45.2175 44.2642C45.3073 44.1741 45.3785 44.067 45.427 43.9492C45.4755 43.8314 45.5003 43.7052 45.5 43.5777C45.5001 43.4274 45.4659 43.2791 45.3999 43.1441L29.8619 11.9746C29.7881 11.8184 29.6717 11.6864 29.5261 11.594C29.3805 11.5016 29.2118 11.4525 29.0395 11.4525C28.8672 11.4525 28.6984 11.5016 28.5529 11.594C28.4073 11.6864 28.2908 11.8184 28.2171 11.9746V11.9791Z"
                                                                            fill="#2684FF" />
                                                                        <defs>
                                                                            <linearGradient id="paint0_linear_2204_541"
                                                                                x1="24.734" y1="29.2284"
                                                                                x2="16.1543" y2="44.0429"
                                                                                gradientUnits="userSpaceOnUse">
                                                                                <stop stop-color="#0052CC" />
                                                                                <stop offset="0.92"
                                                                                    stop-color="#2684FF" />
                                                                            </linearGradient>
                                                                        </defs>
                                                                    </svg>
                                                                </div>

                                                                <div class="p-4 md:p-6">
                                                                    <span
                                                                        class="block text-center mb-1 text-xs font-semibold uppercase text-blue-600 dark:text-blue-500">
                                                                        50 POINTS
                                                                    </span>
                                                                    <h3
                                                                        class="text-center text-xl font-semibold text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                                                        10% Room Discount
                                                                    </h3>
                                                                    <p class="text-center mt-3 text-gray-500">
                                                                        Reduction/Decrease in the price of a room
                                                                        offered in ANAA
                                                                    </p>
                                                                    @auth
                                                                    @if ($user->points >= 50)
                                                                        <div class="flex justify-center mt-4">
                                                                            <button onclick="redeemDiscount10()"
                                                                                data-hs-overlay="#hs-large-modal"
                                                                                id="redeemButton"
                                                                                class="bg-transparent hover:bg-primary duration-300 hover:text-white text-primary px-10 rounded-lg border border-primary ">Redeem</button>
                                                                        </div>
                                                                    @else
                                                                    @endauth
                                                                        <div class="flex justify-center mt-4">
                                                                            <button disabled
                                                                                class="cursor-not-allowed bg-transparent hover:bg-primary duration-300 hover:text-white text-primary px-10 rounded-lg border border-primary ">Redeem</button>
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                            <!-- End Card -->

                                                            <!-- Card -->
                                                            <div
                                                                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                                <div
                                                                    class="h-52 flex flex-col justify-center items-center bg-rose-500 rounded-t-xl">
                                                                    <svg class="size-28" width="56"
                                                                        height="56" viewBox="0 0 56 56"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="56" height="56"
                                                                            rx="10" fill="white" />
                                                                        <g clip-path="url(#clip0_2204_541)">
                                                                            <path
                                                                                d="M37.0409 28.8697C33.1968 28.8697 30.0811 31.9854 30.0811 35.8288C30.0811 39.6726 33.1968 42.789 37.0409 42.789C40.8843 42.789 44 39.6726 44 35.8288C44 31.9854 40.8843 28.8697 37.0409 28.8697ZM18.9594 28.8701C15.116 28.8704 12 31.9854 12 35.8292C12 39.6726 15.116 42.7886 18.9594 42.7886C22.8032 42.7886 25.9192 39.6726 25.9192 35.8292C25.9192 31.9854 22.8032 28.8701 18.9591 28.8701H18.9594ZM34.9595 20.1704C34.9595 24.0138 31.8438 27.1305 28.0004 27.1305C24.1563 27.1305 21.0406 24.0138 21.0406 20.1704C21.0406 16.3269 24.1563 13.2109 28.0003 13.2109C31.8438 13.2109 34.9591 16.3269 34.9591 20.1704H34.9595Z"
                                                                                fill="url(#paint0_radial_2204_541)" />
                                                                        </g>
                                                                        <defs>
                                                                            <radialGradient id="paint0_radial_2204_541"
                                                                                cx="0" cy="0" r="1"
                                                                                gradientUnits="userSpaceOnUse"
                                                                                gradientTransform="translate(28.0043 29.3944) scale(21.216 19.6102)">
                                                                                <stop stop-color="#FFB900" />
                                                                                <stop offset="0.6"
                                                                                    stop-color="#F95D8F" />
                                                                                <stop offset="0.999"
                                                                                    stop-color="#F95353" />
                                                                            </radialGradient>
                                                                            <clipPath id="clip0_2204_541">
                                                                                <rect width="32" height="29.5808"
                                                                                    fill="white"
                                                                                    transform="translate(12 13.2096)" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                                <div class="p-4 md:p-6">
                                                                    <span
                                                                        class="text-center block mb-1 text-xs font-semibold uppercase text-rose-600 dark:text-rose-500">
                                                                        100 POINTS
                                                                    </span>
                                                                    <h3
                                                                        class="text-center text-xl font-semibold text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                                                        20% Room Discount
                                                                    </h3>
                                                                    <p class="mt-3 text-gray-500">
                                                                        Reduction/Decrease in the price of a room
                                                                        offered in ANAA
                                                                    </p>
                                                                    @auth
                                                                    @if ($user->points >= 100)
                                                                        <div class="flex justify-center mt-4">

                                                                            <button onclick="redeemDiscount20()"
                                                                                data-hs-overlay="#hs-large-modal"
                                                                                id="redeemButton20"
                                                                                class="bg-transparent hover:bg-primary duration-300 hover:text-white text-primary px-10 rounded-lg border border-primary ">Redeem</button>
                                                                        </div>
                                                                    @else
                                                                    @endauth
                                                                        <div class="flex justify-center mt-4">

                                                                            <button disabled
                                                                                class="cursor-not-allowed bg-transparent hover:bg-primary duration-300 hover:text-white text-primary px-10 rounded-lg border border-primary ">Redeem</button>
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                            <!-- End Card -->

                                                            <!-- Card -->
                                                            <div
                                                                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                                <div
                                                                    class="h-52 flex flex-col justify-center items-center bg-amber-500 rounded-t-xl">
                                                                    <svg class="size-28" width="56"
                                                                        height="56" viewBox="0 0 56 56"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="56" height="56"
                                                                            rx="10" fill="white" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M23.7326 11.968C21.9637 11.9693 20.5321 13.4049 20.5334 15.1738C20.5321 16.9427 21.965 18.3782 23.7339 18.3795H26.9345V15.1751C26.9358 13.4062 25.5029 11.9706 23.7326 11.968C23.7339 11.968 23.7339 11.968 23.7326 11.968M23.7326 20.5184H15.2005C13.4316 20.5197 11.9987 21.9553 12 23.7242C11.9974 25.4931 13.4303 26.9286 15.1992 26.9312H23.7326C25.5016 26.9299 26.9345 25.4944 26.9332 23.7255C26.9345 21.9553 25.5016 20.5197 23.7326 20.5184V20.5184Z"
                                                                            fill="#36C5F0" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M44.0001 23.7242C44.0014 21.9553 42.5684 20.5197 40.7995 20.5184C39.0306 20.5197 37.5977 21.9553 37.599 23.7242V26.9312H40.7995C42.5684 26.9299 44.0014 25.4944 44.0001 23.7242ZM35.4666 23.7242V15.1738C35.4679 13.4062 34.0363 11.9706 32.2674 11.968C30.4985 11.9693 29.0656 13.4049 29.0669 15.1738V23.7242C29.0643 25.4931 30.4972 26.9286 32.2661 26.9312C34.035 26.9299 35.4679 25.4944 35.4666 23.7242Z"
                                                                            fill="#2EB67D" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M32.2661 44.0322C34.035 44.0309 35.4679 42.5953 35.4666 40.8264C35.4679 39.0575 34.035 37.622 32.2661 37.6207H29.0656V40.8264C29.0642 42.594 30.4972 44.0295 32.2661 44.0322ZM32.2661 35.4804H40.7995C42.5684 35.4791 44.0013 34.0436 44 32.2747C44.0026 30.5058 42.5697 29.0702 40.8008 29.0676H32.2674C30.4985 29.0689 29.0656 30.5045 29.0669 32.2734C29.0656 34.0436 30.4972 35.4791 32.2661 35.4804V35.4804Z"
                                                                            fill="#ECB22E" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M12 32.2746C11.9987 34.0435 13.4316 35.479 15.2005 35.4804C16.9694 35.479 18.4024 34.0435 18.401 32.2746V29.0688H15.2005C13.4316 29.0702 11.9987 30.5057 12 32.2746ZM20.5334 32.2746V40.825C20.5308 42.5939 21.9637 44.0295 23.7326 44.0321C25.5016 44.0308 26.9345 42.5952 26.9332 40.8263V32.2772C26.9358 30.5083 25.5029 29.0728 23.7339 29.0702C21.9637 29.0702 20.5321 30.5057 20.5334 32.2746C20.5334 32.2759 20.5334 32.2746 20.5334 32.2746Z"
                                                                            fill="#E01E5A" />
                                                                    </svg>
                                                                </div>
                                                                <div class="p-4 md:p-6">
                                                                    <span
                                                                        class="text-center block mb-1 text-xs font-semibold uppercase text-amber-500">
                                                                        140 POINTS
                                                                    </span>
                                                                    <h3
                                                                        class="text-center text-xl font-semibold text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                                                        30% Room Discount
                                                                    </h3>
                                                                    <p class="mt-3 text-gray-500">
                                                                        Reduction/Decrease in the price of a room
                                                                        offered in ANAA
                                                                    </p>
                                                                    @auth
                                                                    @if ($user->points >= 140)
                                                                        <div class="flex justify-center mt-4">
                                                                            <button onclick="redeemDiscount30()"
                                                                                data-hs-overlay="#hs-large-modal"
                                                                                id="redeemButton30"
                                                                                class="bg-transparent hover:bg-primary duration-300 hover:text-white text-primary px-10 rounded-lg border border-primary ">Redeem</button>
                                                                        </div>
                                                                    @else
                                                                        <div class="flex justify-center mt-4">
                                                                            <button disabled
                                                                                class="cursor-not-allowed bg-transparent hover:bg-primary duration-300 hover:text-white text-primary px-10 rounded-lg border border-primary ">Redeem</button>
                                                                        </div>
                                                                    @endif
                                                                    @endauth
                                                                </div>

                                                            </div>
                                                            <!-- End Card -->
                                                            <!-- Card -->
                                                            <div
                                                                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                                <div
                                                                    class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                                                                    <svg class="size-28" width="56" height="56"
                                                                        viewBox="0 0 56 56" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="56" height="56"
                                                                            rx="10" fill="white" />
                                                                        <path
                                                                            d="M20.2819 26.7478C20.1304 26.5495 19.9068 26.4194 19.6599 26.386C19.4131 26.3527 19.1631 26.4188 18.9647 26.5698C18.848 26.6622 18.7538 26.78 18.6894 26.9144L10.6019 43.1439C10.4874 43.3739 10.4686 43.6401 10.5496 43.884C10.6307 44.1279 10.805 44.3295 11.0342 44.4446C11.1681 44.5126 11.3163 44.5478 11.4664 44.5473H22.7343C22.9148 44.5519 23.0927 44.5037 23.2462 44.4084C23.3998 44.3132 23.5223 44.1751 23.5988 44.011C26.0307 38.9724 24.5566 31.3118 20.2819 26.7478Z"
                                                                            fill="url(#paint0_linear_2204_541)" />
                                                                        <path
                                                                            d="M28.2171 11.9791C26.201 15.0912 25.026 18.6755 24.8074 22.3805C24.5889 26.0854 25.3342 29.7837 26.9704 33.1126L32.403 44.0113C32.4833 44.1724 32.6067 44.3079 32.7593 44.4026C32.912 44.4973 33.088 44.5475 33.2675 44.5476H44.5331C44.6602 44.5479 44.7861 44.523 44.9035 44.4743C45.0209 44.4257 45.1276 44.3543 45.2175 44.2642C45.3073 44.1741 45.3785 44.067 45.427 43.9492C45.4755 43.8314 45.5003 43.7052 45.5 43.5777C45.5001 43.4274 45.4659 43.2791 45.3999 43.1441L29.8619 11.9746C29.7881 11.8184 29.6717 11.6864 29.5261 11.594C29.3805 11.5016 29.2118 11.4525 29.0395 11.4525C28.8672 11.4525 28.6984 11.5016 28.5529 11.594C28.4073 11.6864 28.2908 11.8184 28.2171 11.9746V11.9791Z"
                                                                            fill="#2684FF" />
                                                                        <defs>
                                                                            <linearGradient id="paint0_linear_2204_541"
                                                                                x1="24.734" y1="29.2284"
                                                                                x2="16.1543" y2="44.0429"
                                                                                gradientUnits="userSpaceOnUse">
                                                                                <stop stop-color="#0052CC" />
                                                                                <stop offset="0.92"
                                                                                    stop-color="#2684FF" />
                                                                            </linearGradient>
                                                                        </defs>
                                                                    </svg>
                                                                </div>

                                                                <div class="p-4 md:p-6">
                                                                    <span
                                                                        class="block text-center mb-1 text-xs font-semibold uppercase text-blue-600 dark:text-blue-500">
                                                                        50 POINTS
                                                                    </span>
                                                                    <h3
                                                                        class="text-center text-xl font-semibold text-gray-800 dark:text-gray-300 dark:hover:text-white">
                                                                        + 3 Hours
                                                                    </h3>
                                                                    <p class="text-center mt-3 text-gray-500">
                                                                        Reduction/Decrease in the price of a room
                                                                        offered in ANAA
                                                                    </p>
                                                                    @auth
                                                                    @if ($user->points >= 50)
                                                                        <div class="flex justify-center mt-4">
                                                                            <button onclick="redeemDiscount10()"
                                                                                data-hs-overlay="#hs-large-modal"
                                                                                id="redeemButton"
                                                                                class="bg-transparent hover:bg-primary duration-300 hover:text-white text-primary px-10 rounded-lg border border-primary ">Redeem</button>
                                                                        </div>
                                                                    @else
                                                                        <div class="flex justify-center mt-4">
                                                                            <button disabled
                                                                                class="cursor-not-allowed bg-transparent hover:bg-primary duration-300 hover:text-white text-primary px-10 rounded-lg border border-primary ">Redeem</button>
                                                                        </div>
                                                                    @endif
                                                                    @endauth
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- End Grid -->
                                                    </div>
                                                    <!-- End Card Blog -->
                                                </div>
                                                <div
                                                    class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                    <button type="button"
                                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        data-hs-overlay="#hs-large-modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:hidden border-b border-gray-200 dark:border-gray-700"></div>


                        </div>
                    </div>
                    <!-- End Table -->

                    <!-- Flex -->
                    <div class="mt-8 flex sm:justify-end">
                        <div class="w-full max-w-2xl sm:text-end space-y-2">
                            <!-- Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Subtotal:
                                    </dt>
                                    <div class="col-span-2" id="priceElement">
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                                        <p class="sm:text-end text-gray-500"><i class="fa-solid fa-peso-sign"></i>
                                            <span id="priceDisplay2">{{ number_format($request['price']) }}</span>
                                        </p>

                                    </div>
                                </dl>

                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Total:</dt>

                                    <div class="col-span-2" id="priceElement">
                                        <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                                        <p class="sm:text-end text-gray-500"><i class="fa-solid fa-peso-sign"></i>
                                            <span id="priceDisplay3">{{ number_format($request['price']) }}</span>
                                        </p>

                                    </div>
                                </dl>

                            </div>
                            <!-- End Grid -->
                        </div>
                    </div>
                    <!-- End Flex -->

                    <div class="mt-8 sm:mt-12">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">ANAA:Hotel and Restaurant
                        </h4>
                        <p class="text-gray-500">If you have any questions concerning this invoice, use the following
                            contact information:</p>
                        <div class="mt-2">
                            <p class="block text-sm font-medium text-gray-800 dark:text-gray-200">anaa.hrms@gmail.com
                            </p>
                            <p class="block text-sm font-medium text-gray-800 dark:text-gray-200">+1 (062) 109-9222</p>
                        </div>
                    </div>

                    <p class="mt-5 text-sm text-gray-500">© 2024 Anaa.</p>
                </div>
                <!-- End Card -->

                <!-- Buttons -->
                <div class="mt-6 flex justify-end gap-x-3">
                    <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                        href="{{ url('/') }}">
                        Cancel Booking
                    </a>
                    <!--REDIRECTS TO HOTEL 2 PAYMENT GATEWAY -->
                    <form action="{{ url('http://192.168.101.75:8000/payment-gateway') }}" method="GET">
                        @csrf
                        <input type="hidden" name="firstname" value="{{ $request['firstname'] }}">
                        <input type="hidden" name="lastname" value="{{ $request['lastname'] }}">
                        <input type="hidden" name="email" value="{{ $request['email'] }}">
                        <input type="hidden" name="start" value="{{ $request['start'] }}">
                        <input type="hidden" name="end" value="{{ $request['end'] }}">
                        <input type="hidden" name="room_type" value="{{ $request['room_type'] }}">
                        <input type="hidden" name="room_no" value="{{ $request['room_no'] }}">
                        <input type="hidden" name="duration" value="{{ $request['duration'] }}">
                        <input type="hidden" id="priceInput" name="price" value="{{ $request['price'] }}">
                        <input type="hidden" name="contact" value="{{ $request['contact'] }}">
                        <input type="hidden" id="use_voucher" name="use_voucher" value="">
                        <input type="hidden" id="voucher_point" name="voucher_point" value="">

                        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                    </form>
                    <!-- End Buttons -->
                </div>
            </div>
            <!-- End Invoice -->
            <script>
                var discountApplied = false;

                function redeemDiscount10() {
                    if (!discountApplied) {
                        var priceDisplay = document.getElementById('priceDisplay');
                        var priceDisplay2 = document.getElementById('priceDisplay2');
                        var priceDisplay3 = document.getElementById('priceDisplay3');
                        var priceInput = document.getElementById('priceInput');
                        var price = parseFloat(priceDisplay.innerHTML.replace(',',
                            '')); // Remove comma if present and parse as float
                        var discountedPrice = price - (price * 0.1); // Subtract 10%
                        priceDisplay.innerHTML = discountedPrice.toFixed(2); // Update displayed price with discounted value
                        priceDisplay2.innerHTML = discountedPrice.toFixed(2);
                        priceDisplay3.innerHTML = discountedPrice.toFixed(2);
                        priceInput.value = discountedPrice.toFixed(2); // Update input value with discounted value
                        discountApplied = true;
                        document.getElementById('redeemButton').innerHTML = 'Applied'; // Change button text to "Applied"
                        document.getElementById('redeemButton').disabled = true; // Disable the button after applying discount
                        document.getElementById('redeemButton20').disabled = true;
                        document.getElementById('redeemButton30').disabled = true;

                        document.getElementById('use_voucher').value = 'Yes';
                    }
                }
                document.getElementById('redeemButton').addEventListener('click', function() {
                    // Set use_voucher input value to "Yes"
                    document.getElementById('use_voucher').value = 'Yes';
                });
                document.getElementById('redeemButton').addEventListener('click', function() {
                    // Set use_voucher input value to "Yes"
                    document.getElementById('voucher_point').value = '50';
                });

                function redeemDiscount20() {
                    var priceDisplay = document.getElementById('priceDisplay');
                    var priceDisplay2 = document.getElementById('priceDisplay2');
                    var priceDisplay3 = document.getElementById('priceDisplay3');
                    var priceInput = document.getElementById('priceInput');
                    var price = parseFloat(priceDisplay.innerHTML.replace(',',
                        '')); // Remove comma if present and parse as float
                    var discountedPrice = price - (price * 0.20); // Subtract 10%
                    priceDisplay.innerHTML = discountedPrice.toFixed(2); // Update displayed price with discounted value
                    priceDisplay2.innerHTML = discountedPrice.toFixed(2);
                    priceDisplay3.innerHTML = discountedPrice.toFixed(2);
                    priceInput.value = discountedPrice.toFixed(2); // Update input value with discounted value
                    discountApplied = true;
                    document.getElementById('redeemButton20').innerHTML = 'Applied'; // Change button text to "Applied"
                    document.getElementById('redeemButton20').disabled = true; // Disable the button after applying discount
                    document.getElementById('redeemButton').disabled = true;
                    document.getElementById('redeemButton30').disabled = true;

                    document.getElementById('use_voucher').value = 'Yes';
                }
                document.getElementById('redeemButton20').addEventListener('click', function() {
                    // Set use_voucher input value to "Yes"
                    document.getElementById('use_voucher').value = 'Yes';
                });
                document.getElementById('redeemButton20').addEventListener('click', function() {
                    // Set use_voucher input value to "Yes"
                    document.getElementById('voucher_point').value = '100';
                });

                function redeemDiscount30() {
                    var priceDisplay = document.getElementById('priceDisplay');
                    var priceDisplay2 = document.getElementById('priceDisplay2');
                    var priceDisplay3 = document.getElementById('priceDisplay3');
                    var priceInput = document.getElementById('priceInput');
                    var price = parseFloat(priceDisplay.innerHTML.replace(',',
                        '')); // Remove comma if present and parse as float
                    var discountedPrice = price - (price * 0.30); // Subtract 10%
                    priceDisplay.innerHTML = discountedPrice.toFixed(2); // Update displayed price with discounted value
                    priceDisplay2.innerHTML = discountedPrice.toFixed(2);
                    priceDisplay3.innerHTML = discountedPrice.toFixed(2);
                    priceInput.value = discountedPrice.toFixed(2); // Update input value with discounted value
                    discountApplied = true;
                    document.getElementById('redeemButton30').innerHTML = 'Applied'; // Change button text to "Applied"
                    document.getElementById('redeemButton30').disabled = true; // Disable the button after applying discount
                    document.getElementById('redeemButton').disabled = true;
                    document.getElementById('redeemButton20').disabled = true;

                    document.getElementById('use_voucher').value = 'Yes';
                }

                document.getElementById('redeemButton30').addEventListener('click', function() {
                    // Set use_voucher input value to "Yes"
                    document.getElementById('use_voucher').value = 'Yes';
                });
                document.getElementById('redeemButton30').addEventListener('click', function() {
                    // Set use_voucher input value to "Yes"
                    document.getElementById('voucher_point').value = '140';
                });
            </script>
    </body>
</body>

</html>
