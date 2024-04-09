<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Payment Confirmation</title>
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
                            <div>
                                <img src="{{asset('assets/images/anaa.png')}}" alt="" class="w-[20vh]">
                            </div>
                        </div>
                        <!-- Col -->

                        <div class="text-end">
                            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-200">Get VIP
                            </h2>
                            {{-- <span class="mt-1 block text-gray-500">3682303</span>

                            <address class="mt-4 not-italic text-gray-800 dark:text-gray-200">
                                45 Roker Terrace<br>
                                Latheronwheel<br>
                                KW5 8NW, London<br>
                                United Kingdom<br>
                            </address> --}}
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- End Grid -->

                    <!-- Grid -->
                    <div class="mt-8 grid sm:grid-cols-2 gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Bill to:</h3>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{Auth::user()->name}}</h3>
                            <p>{{Auth::user()->email}}</p>
                        </div>
                        <!-- Col -->

                        <div class="sm:text-end space-y-2">
                            <!-- Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Invoice date:
                                    </dt>
                                    @php
                                        $today =  Carbon\Carbon::now()->toDateString();
                                    @endphp
                                    <dd class="col-span-2 text-gray-500">{{$today}}</dd>
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
                                <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Item</div>
                                <div class="text-start text-xs font-medium text-gray-500 uppercase">Qty</div>
                                <div class="text-end text-xs font-medium text-gray-500 uppercase">Amount</div>
                            </div>

                            <div class="hidden sm:block border-b border-gray-200 dark:border-gray-700"></div>

                            <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                                <div class="col-span-full sm:col-span-2">
                                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                                    <p class="font-medium text-gray-800 dark:text-gray-200">Hotel Loyalty</p>
                                </div>
                                <div>
                                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                                    <p class="text-gray-800 dark:text-gray-200"></p>
                                </div>
                                <div>
                                    <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                                    <p class="sm:text-end text-gray-800 dark:text-gray-200"><i class="fa-solid fa-peso-sign"></i> 1,499</p>
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
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Subtotal:</dt>
                                    <dd class="col-span-2 text-gray-500"><i class="fa-solid fa-peso-sign"></i> 1,499</dd>
                                </dl>

                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Total:</dt>
                                    <dd class="col-span-2 text-gray-500"><i class="fa-solid fa-peso-sign"></i> 1,   499</dd>
                                </dl>

                               
                            </div>
                            <!-- End Grid -->
                        </div>
                    </div>
                    <!-- End Flex -->

                    <div class="mt-8 sm:mt-12">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Thank you!</h4>
                        <p class="text-gray-500">If you have any questions concerning this invoice, use the following
                            contact information:</p>
                        <div class="mt-2">
                            <p class="block text-sm font-medium text-gray-800 dark:text-gray-200">example@site.com</p>
                            <p class="block text-sm font-medium text-gray-800 dark:text-gray-200">+1 (062) 109-9222</p>
                        </div>
                    </div>

                    <p class="mt-5 text-sm text-gray-500">© 2022 Preline.</p>
                </div>
                <!-- End Card -->

                <!-- Buttons -->
                <div class="mt-6 flex justify-end gap-x-3">
                    <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                        href="{{url('user-profile')}}">
                        Cancel Transaction  
                    </a>
                    <!--TO HOTEL 2 PAYMENT GATEWAY -->
                    <form action="{{ url('http://192.168.101.75:8000/loyalty-payment-gateway') }}" method="GET">
                        @csrf
                        <input type="hidden" name="name" value="{{Auth::user()->name}}">
                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                    </form>
                </div>
                <!-- End Buttons -->
            </div>
        </div>
        <!-- End Invoice -->
    </body>

</body>

</html>
