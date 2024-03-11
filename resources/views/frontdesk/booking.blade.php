<x-app-layout>


  
    <div class="panel">
        <nav class="relative z-0 flex border rounded-xl overflow-hidden dark:border-gray-700" aria-label="Tabs"
            role="tablist">
            <button type="button"
                class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white dark:hs-tab-active:border-b-blue-600 relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-400 active"
                id="bar-with-underline-item-1" data-hs-tab="#bar-with-underline-1" aria-controls="bar-with-underline-1"
                role="tab">
                Guest Information
            </button>
            <button type="button"
                class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white dark:hs-tab-active:border-b-blue-600 relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-400"
                id="bar-with-underline-item-2" data-hs-tab="#bar-with-underline-2" aria-controls="bar-with-underline-2"
                role="tab">
                Check Booking
            </button>
           
        </nav>

        <div class="mt-3">
            <form action="{{url('submit-frontdesk-assigned-room')}}" method="POST">
                @csrf
                <div class="" id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">
                    <div class="panel p-10">
                        <div class=" grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="name1" class="block text-gray-700 font-semibold mb-2">First Name</label>
                                <input type="text" id="name1" name="firstname" class="form-input w-full"
                                    placeholder="Your name" required>

                            </div>
                            <div class="mb-4">
                                <label for="name2" class="block text-gray-700 font-semibold mb-2">Last Name</label>
                                <input type="text" id="name2" name="lastname" class="form-input w-full"
                                    placeholder="Your name" required>

                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                            <input type="email" id="email" name="email" class="form-input w-full"
                                placeholder="example@gmail.com" required>
                                @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="text-red-600">{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="contact" class="block text-gray-700 font-semibold mb-2">Contact #</label>
                            <input type="number" id="contact" name="contact_no" class="form-input w-full"
                                placeholder="contact" required>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="guestID">Guest's ID</label>
                                <select id="guestID" name="guest_id" class="form-select text-white-dark" required>
                                    <option value="" disabled selected>Select ID's</option>
                                    <option value="Professional Regulation Commission (PRC) ID">Professional Regulation
                                        Commission (PRC) ID</option>
                                    <option value="Driver’s License">Driver’s License</option>
                                    <option value="National ID">National ID</option>
                                    <option value="Philippine Passport">Philippine Passport</option>
                                    <option value="Philippine National ID">Philippine National ID</option>
                                    <option value="Unified Multi-Purpose ID (UMID)">Unified Multi-Purpose ID (UMID)
                                    </option>
                                    <option value="Postal ID">Postal ID</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="guest_id_no" class="block text-gray-700 font-semibold mb-2">Guest ID
                                    number</label>
                                <input type="text" id="guest_id_no" name="id_number" class="form-input w-full"
                                    required>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-end mt-4">
                        <button id="triggerButton" class="btn btn-primary">Next</button>
                        <button type="button" id="loading_btn"
                            class="hidden  btn btn-primary  inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <span
                                class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                                role="status" aria-label="loading"></span>
                            Loading
                        </button>
                    </div>
                </div>

                <div id="bar-with-underline-2" class="hidden" role="tabpanel"
                    aria-labelledby="bar-with-underline-item-2">
                    <div class="panel p-10">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4 ">
                                <label for="adult" class="block text-gray-700 font-semibold mb-2">Number of
                                    Adults</label>
                                <input type="number" id="adult" name="adult_no" class="form-input w-full" required>

                            </div>
                            <div class="mb-4 ">
                                <label for="child" class="block text-gray-700 font-semibold mb-2">Number of
                                    Children</label>
                                <input type="number" id="child" name="child_no" class="form-input w-full" required>

                            </div>

                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="per">Room Type</label>
                                <select id="per" name="room_type" class="form-select text-white-dark" required>
                                    <option value="" disabled selected>Select Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->RoomType }}"
                                            {{ $room->RoomStatus == 'Occupied' ? 'disabled' : '' }}>
                                            {{ $room->RoomType }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="per">Room Number</label>
                                <select id="per" name="room_no" class="form-select text-white-dark" required>
                                    <option value="" disabled selected>Select Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->RoomNumber }}"
                                            {{ $room->RoomStatus == 'Occupied' ? 'disabled' : '' }}>
                                            {{ $room->RoomType }} {{ $room->RoomNumber }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">

                                <label for="">Check In & Check out</label>


                                <div date-rangepicker class="flex items-center">

                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input name="checkin" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date start">
                                    </div>
                                    <span class="mx-4 text-gray-500">to</span>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input name="checkout" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date end">
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="mt-4">
                            <div>
                                <label for="">Number of hours/Per Stay</label>
                            </div>
                            <div class="flex items-center ">
                                <label for="3"
                                    class="max-w-xs flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <input type="radio" value="3" name="per_stay"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="3">
                                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">3 hours</span>
                                </label>

                                <label for="6"
                                    class="ml-2 max-w-xs flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <input type="radio" value="6" name="per_stay"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="6">
                                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">6 hours</span>
                                </label>
                            </div>
                            <div class="flex items-center ">
                                <label for="12"
                                    class="max-w-xs flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <input type="radio" name="per_stay" value="12"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="12">
                                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">12 hours</span>
                                </label>

                                <label for="24"
                                    class="ml-2 max-w-xs flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <input type="radio" name="per_stay" value="24"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="24">
                                    <span class="text-sm text-gray-500 ms-3 dark:text-gray-400">One day stay</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-4 mt-4 grid grid-cols-2 gap-4">
                            <div class="">
                                <div>
                                    <label for="">Special Request</label>
                                </div>
                                <div class="mt-4 grid grid-cols-2 ">

                                    <div>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" class="form-checkbox" value="Extra Towel" name="special_request[]"
                                                id="extraTowel" />
                                            <span class=" text-white-dark"">Extra Towel</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" class="form-checkbox" value="Extra Toiletries" name="special_request[]"
                                                id="extraToiletries" />
                                            <span class=" text-white-dark"">Extra Toiletries</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" class="form-checkbox" value="Extra Soap" name="special_request[]"
                                                id="extraSoap" />
                                            <span class=" text-white-dark"">Extra Soap</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" class="form-checkbox" value="Extra Blanket" name="special_request[]"
                                                id="extraBlanket" />
                                            <span class=" text-white-dark"">Extra Blanket</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" class="form-checkbox" value="Extra Pillows" name="special_request[]"
                                                id="extraPillows" />
                                            <span class=" text-white-dark"">Extra Pillows</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" class="form-checkbox" value="Extra Slippers" name="special_request[]"
                                                id="extraSlippers" />
                                            <span class=" text-white-dark"">Extra Slippers</span>
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div class="">
                                <label for="ctnTextarea">Additional Requests</label>
                                <textarea name="additional_request" id="ctnTextarea" rows="3" class="form-textarea"
                                    placeholder="Enter Textarea"></textarea>
                            </div>

                        </div>
                        <div>
                            <div class="flex items-center justify-end">
                                <label for="amount" class="mr-4">Amount</label>
                                <div class="flex items-center">
                                    <span class="mr-4"><i class="fa-solid fa-peso-sign"></i></span>
                                    <input required type="text" id="amount" name="total_amount" class="form-input" readonly />
                                </div>
                            </div>
                            @if ($errors->has('total_amount'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="text-red-600">{{ $errors->first('total_amount') }}</span>
                                </div>
                            @endif
                        </div>
             
                        
                      

                    </div>
                    <div class="flex justify-end mt-4">
                        <button id="triggerButton2" class="btn btn-success">Submit</button>
                        <button type="button" id="loading_btn2"
                            class="hidden  btn btn-success  inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <span
                                class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                                role="status" aria-label="loading"></span>
                            Loading
                        </button>
                    </div>
                </div>
                
            </form>
        </div>

    </div>
    <script>
        var roomType = document.getElementById('per');

        var amountInput = document.getElementById('amount');
        var three = document.getElementById('3');
        var six = document.getElementById('6');
        var twelve = document.getElementById('12');
        var twentyfour = document.getElementById('24');

        roomType.addEventListener('change', function() {

            if (roomType.value === 'Standard') {

                if (three) {
                    three.addEventListener('change', function() {
                        if (three.checked) {
                            amountInput.value = three.value * 300;
                        }
                    });
                }
                if (six) {
                    six.addEventListener('change', function() {
                        if (six.checked) {
                            amountInput.value = six.value * 200;
                        }
                    });
                }
                if (twelve) {
                    twelve.addEventListener('change', function() {
                        if (twelve.checked) {
                            amountInput.value = twelve.value * 150;
                        }
                    });
                }
                if (twentyfour) {
                    twentyfour.addEventListener('change', function() {
                        if (twentyfour.checked) {
                            amountInput.value = twentyfour.value * 100;
                        }
                    });
                }
            }

            if (roomType.value === 'Deluxe') {

                if (three) {
                    three.addEventListener('change', function() {
                        if (three.checked) {
                            amountInput.value = three.value * 333;
                        }
                    });
                }
                if (six) {
                    six.addEventListener('change', function() {
                        if (six.checked) {
                            amountInput.value = six.value * 250;
                        }
                    });
                }
                if (twelve) {
                    twelve.addEventListener('change', function() {
                        if (twelve.checked) {
                            amountInput.value = twelve.value * 166;
                        }
                    });
                }
                if (twentyfour) {
                    twentyfour.addEventListener('change', function() {
                        if (twentyfour.checked) {
                            amountInput.value = twentyfour.value * 104;
                        }
                    });
                }
            }

            if (roomType.value === 'Suite') {

                if (three) {
                    three.addEventListener('change', function() {
                        if (three.checked) {
                            amountInput.value = three.value * 500;
                        }
                    });
                }
                if (six) {
                    six.addEventListener('change', function() {
                        if (six.checked) {
                            amountInput.value = six.value * 300;
                        }
                    });
                }
                if (twelve) {
                    twelve.addEventListener('change', function() {
                        if (twelve.checked) {
                            amountInput.value = twelve.value * 166;
                        }
                    });
                }
                if (twentyfour) {
                    twentyfour.addEventListener('change', function() {
                        if (twentyfour.checked) {
                            amountInput.value = twentyfour.value * 104;
                        }
                    });
                }
            }

            if (roomType.value === 'Family') {

                if (three) {
                    three.addEventListener('change', function() {
                        if (three.checked) {
                            amountInput.value = three.value * 666;
                        }
                    });
                }
                if (six) {
                    six.addEventListener('change', function() {
                        if (six.checked) {
                            amountInput.value = six.value * 416;
                        }
                    });
                }
                if (twelve) {
                    twelve.addEventListener('change', function() {
                        if (twelve.checked) {
                            amountInput.value = twelve.value * 250;
                        }
                    });
                }
                if (twentyfour) {
                    twentyfour.addEventListener('change', function() {
                        if (twentyfour.checked) {
                            amountInput.value = twentyfour.value * 145;
                        }
                    });
                }
            }

            if (roomType.value === 'Executive') {

                if (three) {
                    three.addEventListener('change', function() {
                        if (three.checked) {
                            amountInput.value = three.value * 333;
                        }
                    });
                }
                if (six) {
                    six.addEventListener('change', function() {
                        if (six.checked) {
                            amountInput.value = six.value * 333;
                        }
                    });
                }
                if (twelve) {
                    twelve.addEventListener('change', function() {
                        if (twelve.checked) {
                            amountInput.value = twelve.value * 208;
                        }
                    });
                }
                if (twentyfour) {
                    twentyfour.addEventListener('change', function() {
                        if (twentyfour.checked) {
                            amountInput.value = twentyfour.value * 125;
                        }
                    });
                }
            }

            if (roomType.value === 'Accessible') {

                if (three) {
                    three.addEventListener('change', function() {
                        if (three.checked) {
                            amountInput.value = three.value * 400;
                        }
                    });
                }
                if (six) {
                    six.addEventListener('change', function() {
                        if (six.checked) {
                            amountInput.value = six.value * 300;
                        }
                    });
                }
                if (twelve) {
                    twelve.addEventListener('change', function() {
                        if (twelve.checked) {
                            amountInput.value = twelve.value * 191;
                        }
                    });
                }
                if (twentyfour) {
                    twentyfour.addEventListener('change', function() {
                        if (twentyfour.checked) {
                            amountInput.value = twentyfour.value * 116;
                        }
                    });
                }
            }



        });


        var towel = document.getElementById('extraTowel');
        var toilet = document.getElementById('extraToiletries');
        var blanket = document.getElementById('extraBlanket');
        var soap = document.getElementById('extraSoap');
        var pillows = document.getElementById('extraPillows');
        var slippers = document.getElementById('extraSlippers');

        if (towel) {
            towel.addEventListener('click', function() {
                if (towel.checked) {
                    var value = 75;
                    var currentAmount = parseFloat(amountInput.value) || 0;

                    var updatedAmount = currentAmount + value;

                    amountInput.value = updatedAmount;

                } else {
                    // If the checkbox is unchecked, subtract the value
                    var value = 75;
                    var currentAmount = parseFloat(amountInput.value) || 0;
                    var updatedAmount = currentAmount - value;
                    amountInput.value = updatedAmount;
                }
            });
        }

        if (toilet) {
            toilet.addEventListener('click', function() {
                if (toilet.checked) {
                    var value = 25;
                    var currentAmount = parseFloat(amountInput.value) || 0;

                    var updatedAmount = currentAmount + value;

                    amountInput.value = updatedAmount;

                } else {
                    // If the checkbox is unchecked, subtract the value
                    var value = 25;
                    var currentAmount = parseFloat(amountInput.value) || 0;
                    var updatedAmount = currentAmount - value;
                    amountInput.value = updatedAmount;
                }
            });
        }

        if (soap) {
            soap.addEventListener('click', function() {
                if (soap.checked) {
                    var value = 30;
                    var currentAmount = parseFloat(amountInput.value) || 0;

                    var updatedAmount = currentAmount + value;

                    amountInput.value = updatedAmount;

                } else {
                    // If the checkbox is unchecked, subtract the value
                    var value = 30;
                    var currentAmount = parseFloat(amountInput.value) || 0;
                    var updatedAmount = currentAmount - value;
                    amountInput.value = updatedAmount;
                }
            });
        }

        if (blanket) {
            blanket.addEventListener('click', function() {
                if (blanket.checked) {
                    var value = 80;
                    var currentAmount = parseFloat(amountInput.value) || 0;

                    var updatedAmount = currentAmount + value;

                    amountInput.value = updatedAmount;

                } else {
                    // If the checkbox is unchecked, subtract the value
                    var value = 80;
                    var currentAmount = parseFloat(amountInput.value) || 0;
                    var updatedAmount = currentAmount - value;
                    amountInput.value = updatedAmount;
                }
            });
        }

        if (pillows) {
            pillows.addEventListener('click', function() {
                if (pillows.checked) {
                    var value = 75;
                    var currentAmount = parseFloat(amountInput.value) || 0;

                    var updatedAmount = currentAmount + value;

                    amountInput.value = updatedAmount;

                } else {
                    // If the checkbox is unchecked, subtract the value
                    var value = 75;
                    var currentAmount = parseFloat(amountInput.value) || 0;
                    var updatedAmount = currentAmount - value;
                    amountInput.value = updatedAmount;
                }
            });
        }

        if (slippers) {
            slippers.addEventListener('click', function() {
                if (slippers.checked) {
                    var value = 100;
                    var currentAmount = parseFloat(amountInput.value) || 0;

                    var updatedAmount = currentAmount + value;

                    amountInput.value = updatedAmount;

                } else {
                    // If the checkbox is unchecked, subtract the value
                    var value = 100;
                    var currentAmount = parseFloat(amountInput.value) || 0;
                    var updatedAmount = currentAmount - value;
                    amountInput.value = updatedAmount;
                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            // Get the button element
            const targetButton = document.getElementById('bar-with-underline-item-2');


            // Set up click event for the trigger button
            document.getElementById('triggerButton').addEventListener('click', function() {
                const name1Input = document.getElementById('name1');
                const name2Input = document.getElementById('name2');
                const name3Input = document.getElementById('email');
                const name4Input = document.getElementById('contact');
                const name5Input = document.getElementById('guestID');
                const name6Input = document.getElementById('guest_id_no');
                if (name1Input.value.trim() !== "" && name2Input.value.trim() !== "" && name3Input.value
                    .trim() !== "" && name4Input.value
                    .trim() !== "" && name5Input.value
                    .trim() !== "" && name6Input.value
                    .trim() !== "") {

                    document.getElementById('triggerButton').classList.add('hidden');
                    document.getElementById('loading_btn').classList.remove('hidden');
                    setTimeout(() => {
                        document.getElementById('triggerButton').classList.remove('hidden');
                        document.getElementById('loading_btn').classList.add('hidden');
                        targetButton.click();
                    }, 2000);
                } else {

                }
            });


            document.getElementById('triggerButton2').addEventListener('click', function() {

                document.getElementById('triggerButton2').classList.add('hidden');
                document.getElementById('loading_btn2').classList.remove('hidden');
                setTimeout(() => {
                    document.getElementById('triggerButton2').classList.remove('hidden');
                    document.getElementById('loading_btn2').classList.add('hidden');
                    targetButton2.submit();
                }, 3000);
             
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</x-app-layout>