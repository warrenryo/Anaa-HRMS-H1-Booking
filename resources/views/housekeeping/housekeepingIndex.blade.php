<x-app-layout>
    @section('title', 'Housekeeping')
    <div class="panel">
        <div class="flex justify-between">
            <form action="" method="GET" class="flex items-center">
                <dd class="font-medium text-gray-800 dark:text-gray-200 mr-2">
                    <div x-data="{ isOptionSelected: false }" class="relative dark:bg-form-input">
                        <select name="filter_status" class="form-select text-white-dark w-[15vh]">
                            <option selected disabled>Select Status</option>
                            <option class="text-black dark:text-white-dark" {{Request::get('filter_status')=='Pending' ? 'selected'
                                :''}}>Pending
                            </option>
                            <option class="text-black dark:text-white-dark" {{Request::get('filter_status')=='Completed'
                                ? 'selected' :''}} value=" Work Order Created">Completed</option>
                        </select>
                    </div>
                </dd>
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter mr-2" viewBox="0 0 16 16">
                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                    </svg>
                    Filter
                </button>
            </form>
            <button data-hs-overlay="#addCategory" class="btn btn-primary" type="button">
                Add Housekeeping Order
            </button>
            <div id="addCategory"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-5xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
                    <div
                        class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                            <h3 class="font-bold text-gray-800 dark:text-white">
                                Add Housekeeping Order
                            </h3>
                            <button type="button"
                                class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                data-hs-overlay="#addCategory">
                                <span class="sr-only">Close</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18" />
                                    <path d="m6 6 12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-4 overflow-y-auto">
                            <form action="{{ url('submit-housekeeping-request') }}" method="POST">
                                @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                <div>
                                    <label for="room_no"
                                        class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Room</label>
                                    <select id="room_no" name="room_no" required
                                        class="form-select form-select-lg text-white-dark">
                                        <option selected disabled>Select Room no.</option>
                                        @foreach($rooms as $room)
                                        <option value="{{$room->RoomNumber}}"> {{$room->RoomNumber}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('room_no'))
                                        <span class="text-red-500 text-sm">*{{ $errors->first('room_no') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="room_no"
                                        class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">What
                                        time?</label>
                                    <input name="time_issue" value="{{ now()->format('H:i') }}"
                                        class="dark:border-[#17263c] dark:bg-[#121e32] dark:text-white-dark dark:focus:border-primary border-gray-300 rounded-md py-2.5 focus:border-primary"
                                        type="time">
                                </div>
                            </div>
                            <!-- End Grid -->

                            <div>
                                <div class="grid grid-cols-2 ">
                                    <div class="w-[25vh] mt-4">
                                        <label for="hs-work-email-hire-us-1"
                                            class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Housekeeping
                                            Request</label>
                                        <label class="inline-flex mt-4">
                                            <input type="checkbox" name="housekeeping_request[]"
                                                value="Cleaning Bathrooms"
                                                class="form-checkbox text-info rounded-full peer" />
                                            <span
                                                class="peer-checked:text-info dark:text-gray-400 text-sm font-medium">Cleaning
                                                Bathrooms</span>
                                        </label>

                                        <label class="inline-flex mt-2">
                                            <input type="checkbox" name="housekeeping_request[]" value="Dispose Trash"
                                                class="form-checkbox text-info rounded-full peer" />
                                            <span
                                                class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Dispose
                                                Trash</span>
                                        </label>
                                        <label class="inline-flex mt-2">
                                            <input type="checkbox" name="housekeeping_request[]"
                                                value="Dusting and Vacuuming"
                                                class="form-checkbox text-info rounded-full peer" />
                                            <span
                                                class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Dusting
                                                and Vacuuming</span>
                                        </label>
                                        <label class="inline-flex mt-2">
                                            <input type="checkbox" name="housekeeping_request[]"
                                                value="Sweeping and Mopping Floors"
                                                class="form-checkbox text-info rounded-full peer" />
                                            <span
                                                class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Sweeping
                                                and Mopping Floors</span>
                                        </label>
                                        <label class="inline-flex mt-2">
                                            <input type="checkbox" name="housekeeping_request[]" value="Linen Change"
                                                class="form-checkbox text-info rounded-full peer" />
                                            <span
                                                class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Linen
                                                Change</span>
                                        </label>
                                    </div>
                                    <div class="w-[22vh] mt-4">
                                        <label for="hs-work-email-hire-us-1"
                                            class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Items &
                                            Services</label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-4">
                                                <input type="checkbox" name="items_services[]" value="Laundry Services"
                                                    class="form-checkbox text-info rounded-full peer" />
                                                <span
                                                    class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Laundry
                                                    Services</span>
                                            </label>
                                        </label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-1">
                                                <input type="checkbox" name="items_services[]" value="Amenities Refill"
                                                    class="form-checkbox text-info rounded-full peer" />
                                                <span
                                                    class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Amenities
                                                    Refill</span>
                                            </label>
                                        </label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-1">
                                                <input type="checkbox" name="items_services[]" value="Extra Blankets"
                                                    class="form-checkbox text-info rounded-full peer" />
                                                <span
                                                    class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Extra
                                                    Blankets</span>
                                            </label>
                                        </label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-1">
                                                <input type="checkbox" name="items_services[]" value="Extra Pillows"
                                                    class="form-checkbox text-info rounded-full peer" />
                                                <span
                                                    class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Extra
                                                    Pillows</span>
                                            </label>
                                        </label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-1">
                                                <input type="checkbox" name="items_services[]" value="Extra Towels"
                                                    class="form-checkbox text-info rounded-full peer" />
                                                <span
                                                    class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Extra
                                                    Towels</span>
                                            </label>
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <div>
                                <label for="hs-about-hire-us-1"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Additional
                                    Request</label>
                                <textarea id="hs-about-hire-us-1" name="additional_request" rows="4"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                data-hs-overlay="#addCategory">
                                Close
                            </button>
                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Submit
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
