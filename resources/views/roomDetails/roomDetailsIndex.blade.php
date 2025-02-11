<x-app-layout>

    @section('title', 'Frontdesk')
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('dashboard') }}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Room Status</span>
        </li>
    </ul>
    <div class="panel mt-4">
        <div class="flex justify-between">
            <form action="" method="GET" class="flex items-center">
                <dd class="font-medium text-gray-800 dark:text-gray-200 mr-2">
                    <div x-data="{ isOptionSelected: false }" class="relative dark:bg-form-input">
                        <select name="filter_status" class="form-select text-white-dark w-[20vh]">
                            <option selected disabled>Select Status</option>
                            <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Occupied' ? 'selected' : '' }} value="Occupied">
                                Occupied
                            </option>
                            <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Vacant' ? 'selected' : '' }}
                                value=" Vacant">Vacant</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Reserved' ? 'selected' : '' }}
                                value=" Reserved">Reserved</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Dirty' ? 'selected' : '' }}
                                value=" Dirty">Dirty</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Inspected' ? 'selected' : '' }}
                                value=" Inspected">Inspected</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Out of Order' ? 'selected' : '' }}
                                value=" Out of Order">Out of Order</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Do not Disturb' ? 'selected' : '' }}
                                value=" Do not Disturb">Do not Disturb</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Stay Over' ? 'selected' : '' }}
                                value="Stay Over">Stay Over</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Checkout' ? 'selected' : '' }}
                                value="Checkout">Checkout</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'No Show' ? 'selected' : '' }}
                                value="No Show">No Show</option>
                                <option class="text-black dark:text-white-dark"
                                {{ Request::get('filter_status') == 'Early Check in' ? 'selected' : '' }}
                                value="Early Check in">Early Check in</option>
                                
                        </select>
                    </div>
                </dd>
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-filter mr-2" viewBox="0 0 16 16">
                        <path
                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                    </svg>
                    Filter
                </button>
            </form>
            <!-- vertically centered -->
            <div class="mb-6" x-data="modal">
                <!-- button -->
                <div class="flex items-center justify-center">
                    <button type="button" class="btn btn-info" @click="toggle">Add Room</button>
                </div>

                <!-- modal -->
                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-center justify-center min-h-screen px-1" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300
                            class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                            <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-3 py-1">
                                <h5 class="font-bold text-lg">Add Room</h5>
                                <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <line x1="18" y1="6" x2="6" y2="18">
                                        </line>
                                        <line x1="6" y1="6" x2="18" y2="18">
                                        </line>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5">
                                <!-- input with label -->

                                <form action="{{ url('submit-room-details') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="guestID">Room Type</label>
                                        <select id="guestID" name="room_type" class="form-select text-white-dark"
                                            required>
                                            <option value="" disabled selected>Select Room Type</option>
                                            <option value="Standard">Standard</option>
                                            <option value="Deluxe">Deluxe</option>
                                            <option value="Deluxe Corporate">Deluxe Corporate</option>
                                            <option value="Prestige Corporate">Prestige Corporate</option>
                                            <option value="Grand Ball">Grand Ball</option>
                                            <option value="Suite">Suite</option>
                                            <option value="Family">Family</option>
                                            <option value="Executive">Executive</option>
                                            <option value="Accessible">Accessible</option>
                                            <option value="Spare Rooms">Spare Rooms</option>
                                        </select>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="mt-2">
                                            <label>
                                                Room Number
                                            </label>
                                            <input type="number" name="room_number" placeholder="Room Number"
                                                class="form-input" />
                                        </div>

                                        <div class="mt-2">
                                            <label>
                                                Max Guests
                                            </label>
                                            <input type="number" name="max_guests" placeholder="Max Guests"
                                                class="form-input" />
                                        </div>
                                    </div>


                                    <div class="mt-4">
                                        <label class="text-lg">
                                            Room Pricing
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="mt-2">
                                            <label>
                                                3 Hours
                                            </label>
                                            <input type="number" name="3h" class="form-input" />
                                        </div>
                                        <div class="mt-2">
                                            <label>
                                                6 Hours
                                            </label>
                                            <input type="number" name="6h" class="form-input" />
                                        </div>
                                        <div class="mt-2">
                                            <label>
                                                12 Hours
                                            </label>
                                            <input type="number" name="12h" class="form-input" />
                                        </div>
                                        <div class="mt-2">
                                            <label>
                                                24 Hours
                                            </label>
                                            <input type="number" name="24h" class="form-input" />
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label for="ctnTextarea">Description</label>
                                        <textarea required name="description" id="ctnTextarea" rows="3" class="form-textarea"
                                            placeholder="Enter Textarea"></textarea>
                                    </div>

                                    <label class="block mt-6">
                                        <span class="sr-only">Choose Image</span>
                                        <input type="file" multiple name="images[]"
                                            class="block w-full text-sm text-gray-500
                                            file:me-4 file:py-2 file:px-4
                                            file:rounded-lg file:border-0
                                            file:text-sm file:font-semibold
                                            file:bg-blue-600 file:text-white
                                            hover:file:bg-blue-700
                                            file:disabled:opacity-50 file:disabled:pointer-events-none
                                            dark:file:bg-blue-500
                                            dark:hover:file:bg-blue-400
                                          ">
                                    </label>

                                    <div class="flex justify-end items-center mt-8">
                                        <button type="button" class="btn btn-outline-danger"
                                            @click="toggle">Discard</button>
                                        <button type="submit"
                                            class="btn btn-primary ltr:ml-4 rtl:mr-4">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Images</th>
                        <th>Room Type ID </th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Max Guests</th>
                        <th>Room Status</th>
                        <th>Change Status</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($room as $rooms)
                        <tr>
                            <td>
                                <img src="{{ asset($rooms->roomImages[0]->images) }}" class="w-32" alt="">
                            </td>
                            <td class="whitespace-nowrap">{{ $rooms->RoomTypeID }}</td>
                            <td>{{ $rooms->RoomType }}</td>
                            <td>{{ $rooms->RoomNumber }}</td>
                            <td>{{ $rooms->MaxGuests }}</td>
                            <td>
                                @if ($rooms->RoomStatus == 'Vacant')
                                    <span class="badge bg-success">{{ $rooms->RoomStatus }}</span>
                                @elseif($rooms->RoomStatus == 'Occupied')
                                    <span class="badge bg-danger">{{ $rooms->RoomStatus }}</span>
                                @elseif($rooms->RoomStatus == 'Inspected')
                                    <span class="badge bg-warning">{{ $rooms->RoomStatus }}</span>
                                @elseif($rooms->RoomStatus == 'Out of Order')
                                    <span class="badge bg-info">{{ $rooms->RoomStatus }}</span>
                                @elseif($rooms->RoomStatus == 'Dirty')
                                    <span class="badge bg-orange-700">{{ $rooms->RoomStatus }}</span>
                                @elseif($rooms->RoomStatus == 'Checkout')
                                    <span class="badge bg-dark">{{ $rooms->RoomStatus }}</span>
                                @else
                                    <span>{{ $rooms->RoomStatus }}</span>
                                @endif
                            </td>
                            <td>
                                <form id="roomStatusForm"
                                    action="{{ url('update-room-status/' . $rooms->id . '/' . $rooms->RoomTypeID) }}"
                                    method="POST">
                                    @csrf
                                    <div class="flex items-center">
                                        <div>
                                            <select id="roomStatus" name="room_status"
                                                class="form-select text-white-dark" required>
                                                <option value="" disabled selected>Select Room Type</option>
                                                <option {{ $rooms->RoomStatus == 'Occupied' ? 'selected' : '' }}
                                                    value="Occupied">Occupied</option>
                                                <option {{ $rooms->RoomStatus == 'Vacant' ? 'selected' : '' }}
                                                    value="Vacant">
                                                    Vacant</option>
                                                <option {{ $rooms->RoomStatus == 'Reserved' ? 'selected' : '' }}
                                                    value="Reserved">Reserved</option>
                                                <option {{ $rooms->RoomStatus == 'Dirty' ? 'selected' : '' }}
                                                    value="Dirty">
                                                    Dirty</option>
                                                <option {{ $rooms->RoomStatus == 'Inspected' ? 'selected' : '' }}
                                                    value="Inspected">Inspected</option>
                                                <option {{ $rooms->RoomStatus == 'Out of Order' ? 'selected' : '' }}
                                                    value="Out of Order">Out of Order</option>
                                                <option {{ $rooms->RoomStatus == 'Do not Disturb' ? 'selected' : '' }}
                                                    value="Do not Disturb">Do not Disturb</option>
                                                <option {{ $rooms->RoomStatus == 'Stay Over' ? 'selected' : '' }}
                                                    value="Stay Over">Stay Over</option>
                                                <option {{ $rooms->RoomStatus == 'Checkout' ? 'selected' : '' }}
                                                    value="Checkout">Checkout</option>
                                                <option {{ $rooms->RoomStatus == 'No Show' ? 'selected' : '' }}
                                                    value="No Show">No Show</option>
                                                <option {{ $rooms->RoomStatus == 'Early Check-In' ? 'selected' : '' }}
                                                    value="Early Check-In">Early Check-In</option>
                                            </select>
                                        </div>
                                        <div class="flex justify-end ml-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            </td>
                            <td>
                                @include('roomDetails.roomDetailsModal')
                                <div class="hs-tooltip inline-block [--trigger:hover] mr-2">
                                    <a href="{{ url('edit-room-details/' . $rooms->id) }}"
                                        class="hs-tooltip-toggle flex justify-center items-center h-10 w-10 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">

                                        <svg class="text-primary" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.9436 1.25H13.0564C14.8942 1.24998 16.3498 1.24997 17.489 1.40314C18.6614 1.56076 19.6104 1.89288 20.3588 2.64124C20.6516 2.93414 20.6516 3.40901 20.3588 3.7019C20.0659 3.9948 19.591 3.9948 19.2981 3.7019C18.8749 3.27869 18.2952 3.02502 17.2892 2.88976C16.2615 2.75159 14.9068 2.75 13 2.75H11C9.09318 2.75 7.73851 2.75159 6.71085 2.88976C5.70476 3.02502 5.12511 3.27869 4.7019 3.7019C4.27869 4.12511 4.02502 4.70476 3.88976 5.71085C3.75159 6.73851 3.75 8.09318 3.75 10V14C3.75 15.9068 3.75159 17.2615 3.88976 18.2892C4.02502 19.2952 4.27869 19.8749 4.7019 20.2981C5.12511 20.7213 5.70476 20.975 6.71085 21.1102C7.73851 21.2484 9.09318 21.25 11 21.25H13C14.9068 21.25 16.2615 21.2484 17.2892 21.1102C18.2952 20.975 18.8749 20.7213 19.2981 20.2981C19.994 19.6022 20.2048 18.5208 20.2414 15.9892C20.2474 15.575 20.588 15.2441 21.0022 15.2501C21.4163 15.2561 21.7472 15.5967 21.7412 16.0108C21.7061 18.4383 21.549 20.1685 20.3588 21.3588C19.6104 22.1071 18.6614 22.4392 17.489 22.5969C16.3498 22.75 14.8942 22.75 13.0564 22.75H10.9436C9.10583 22.75 7.65019 22.75 6.51098 22.5969C5.33856 22.4392 4.38961 22.1071 3.64124 21.3588C2.89288 20.6104 2.56076 19.6614 2.40314 18.489C2.24997 17.3498 2.24998 15.8942 2.25 14.0564V9.94358C2.24998 8.10582 2.24997 6.65019 2.40314 5.51098C2.56076 4.33856 2.89288 3.38961 3.64124 2.64124C4.38961 1.89288 5.33856 1.56076 6.51098 1.40314C7.65019 1.24997 9.10582 1.24998 10.9436 1.25ZM18.1131 7.04556C19.1739 5.98481 20.8937 5.98481 21.9544 7.04556C23.0152 8.1063 23.0152 9.82611 21.9544 10.8869L17.1991 15.6422C16.9404 15.901 16.7654 16.076 16.5693 16.2289C16.3387 16.4088 16.0892 16.563 15.8252 16.6889C15.6007 16.7958 15.3659 16.8741 15.0187 16.9897L12.9351 17.6843C12.4751 17.8376 11.9679 17.7179 11.625 17.375C11.2821 17.0321 11.1624 16.5249 11.3157 16.0649L11.9963 14.0232C12.001 14.0091 12.0056 13.9951 12.0102 13.9813C12.1259 13.6342 12.2042 13.3993 12.3111 13.1748C12.437 12.9108 12.5912 12.6613 12.7711 12.4307C12.924 12.2346 13.099 12.0596 13.3578 11.8009C13.3681 11.7906 13.3785 11.7802 13.3891 11.7696L18.1131 7.04556ZM20.8938 8.10622C20.4188 7.63126 19.6488 7.63126 19.1738 8.10622L18.992 8.288C19.0019 8.32149 19.0132 8.3571 19.0262 8.39452C19.1202 8.66565 19.2988 9.02427 19.6372 9.36276C19.9757 9.70125 20.3343 9.87975 20.6055 9.97382C20.6429 9.9868 20.6785 9.99812 20.712 10.008L20.8938 9.8262C21.3687 9.35124 21.3687 8.58118 20.8938 8.10622ZM19.5664 11.1536C19.2485 10.9866 18.9053 10.7521 18.5766 10.4234C18.2479 10.0947 18.0134 9.75146 17.8464 9.43357L14.4497 12.8303C14.1487 13.1314 14.043 13.2388 13.9538 13.3532C13.841 13.4979 13.7442 13.6545 13.6652 13.8202C13.6028 13.9511 13.5539 14.0936 13.4193 14.4976L13.019 15.6985L13.3015 15.981L14.5024 15.5807C14.9064 15.4461 15.0489 15.3972 15.1798 15.3348C15.3455 15.2558 15.5021 15.159 15.6468 15.0462C15.7612 14.957 15.8686 14.8513 16.1697 14.5503L19.5664 11.1536ZM7.25 9C7.25 8.58579 7.58579 8.25 8 8.25H14.5C14.9142 8.25 15.25 8.58579 15.25 9C15.25 9.41421 14.9142 9.75 14.5 9.75H8C7.58579 9.75 7.25 9.41421 7.25 9ZM7.25 13C7.25 12.5858 7.58579 12.25 8 12.25H10.5C10.9142 12.25 11.25 12.5858 11.25 13C11.25 13.4142 10.9142 13.75 10.5 13.75H8C7.58579 13.75 7.25 13.4142 7.25 13ZM7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H9.5C9.91421 16.25 10.25 16.5858 10.25 17C10.25 17.4142 9.91421 17.75 9.5 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z"
                                                fill="#4361ee" />
                                        </svg>

                                        <span
                                            class=" hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-3 px-4 bg-white border text-sm text-gray-600 rounded-lg shadow-md dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400"
                                            role="tooltip">
                                            Edit Item
                                        </span>
                                    </a>
                                </div>
                                <div class="hs-tooltip inline-block [--trigger:hover] mr-2">
                                    <button type="button" data-hs-overlay="#delete-item{{ $rooms->id }}"
                                        class="hs-tooltip-toggle flex justify-center items-center h-10 w-10 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">

                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 2.75C11.0215 2.75 10.1871 3.37503 9.87787 4.24993C9.73983 4.64047 9.31134 4.84517 8.9208 4.70713C8.53026 4.56909 8.32557 4.1406 8.46361 3.75007C8.97804 2.29459 10.3661 1.25 12 1.25C13.634 1.25 15.022 2.29459 15.5365 3.75007C15.6745 4.1406 15.4698 4.56909 15.0793 4.70713C14.6887 4.84517 14.2602 4.64047 14.1222 4.24993C13.813 3.37503 12.9785 2.75 12 2.75Z"
                                                fill="#e7515a" />
                                            <path
                                                d="M2.75 6C2.75 5.58579 3.08579 5.25 3.5 5.25H20.5001C20.9143 5.25 21.2501 5.58579 21.2501 6C21.2501 6.41421 20.9143 6.75 20.5001 6.75H3.5C3.08579 6.75 2.75 6.41421 2.75 6Z"
                                                fill="#e7515a" />
                                            <path
                                                d="M5.91508 8.45011C5.88753 8.03681 5.53015 7.72411 5.11686 7.75166C4.70356 7.77921 4.39085 8.13659 4.41841 8.54989L4.88186 15.5016C4.96735 16.7844 5.03641 17.8205 5.19838 18.6336C5.36678 19.4789 5.6532 20.185 6.2448 20.7384C6.83639 21.2919 7.55994 21.5307 8.41459 21.6425C9.23663 21.75 10.2751 21.75 11.5607 21.75H12.4395C13.7251 21.75 14.7635 21.75 15.5856 21.6425C16.4402 21.5307 17.1638 21.2919 17.7554 20.7384C18.347 20.185 18.6334 19.4789 18.8018 18.6336C18.9637 17.8205 19.0328 16.7844 19.1183 15.5016L19.5818 8.54989C19.6093 8.13659 19.2966 7.77921 18.8833 7.75166C18.47 7.72411 18.1126 8.03681 18.0851 8.45011L17.6251 15.3492C17.5353 16.6971 17.4712 17.6349 17.3307 18.3405C17.1943 19.025 17.004 19.3873 16.7306 19.6431C16.4572 19.8988 16.083 20.0647 15.391 20.1552C14.6776 20.2485 13.7376 20.25 12.3868 20.25H11.6134C10.2626 20.25 9.32255 20.2485 8.60915 20.1552C7.91715 20.0647 7.54299 19.8988 7.26957 19.6431C6.99616 19.3873 6.80583 19.025 6.66948 18.3405C6.52891 17.6349 6.46488 16.6971 6.37503 15.3492L5.91508 8.45011Z"
                                                fill="#e7515a" />
                                            <path
                                                d="M9.42546 10.2537C9.83762 10.2125 10.2051 10.5132 10.2464 10.9254L10.7464 15.9254C10.7876 16.3375 10.4869 16.7051 10.0747 16.7463C9.66256 16.7875 9.29502 16.4868 9.25381 16.0746L8.75381 11.0746C8.71259 10.6625 9.0133 10.2949 9.42546 10.2537Z"
                                                fill="#e7515a" />
                                            <path
                                                d="M15.2464 11.0746C15.2876 10.6625 14.9869 10.2949 14.5747 10.2537C14.1626 10.2125 13.795 10.5132 13.7538 10.9254L13.2538 15.9254C13.2126 16.3375 13.5133 16.7051 13.9255 16.7463C14.3376 16.7875 14.7051 16.4868 14.7464 16.0746L15.2464 11.0746Z"
                                                fill="#e7515a" />
                                        </svg>


                                        <span
                                            class=" hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-3 px-4 bg-white border text-sm text-gray-600 rounded-lg shadow-md dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400"
                                            role="tooltip">
                                            Delete Item
                                        </span>
                                    </button>
                                </div>
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


</x-app-layout>
