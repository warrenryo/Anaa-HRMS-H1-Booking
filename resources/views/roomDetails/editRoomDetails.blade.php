<x-app-layout>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{url('room-details')}}" class="text-primary hover:underline">Room Details</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span> Edit Room Details</span>
        </li>
    </ul>
    <div class="mt-4">
        <div class="panel">
            <div>
                <form action="{{ url('update-room-details/'.$room->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="guestID">Room Type</label>
                        <select id="guestID" name="room_type" class="form-select text-white-dark" required>
                            <option value="" disabled selected>Select Room Type</option>
                            <option  {{$room->RoomType == 'Standard' ? 'selected':''}} value="Standard">Standard</option>
                            <option {{$room->RoomType == 'Deluxe' ? 'selected':''}} value="Deluxe">Deluxe</option>
                            <option {{$room->RoomType == 'Deluxe Corporate' ? 'selected':''}} value="Deluxe Corporate">Deluxe Corporate</option>
                            <option {{$room->RoomType == 'Prestige Corporate' ? 'selected':''}} value="Prestige Corporate">Prestige Corporate</option>
                            <option {{$room->RoomType == 'Grand Ball' ? 'selected':''}} value="Grand Ball">Grand Ball</option>
                            <option {{$room->RoomType == 'Suite' ? 'selected':''}} value="Suite">Suite</option>
                            <option {{$room->RoomType == 'Family' ? 'selected':''}} value="Family">Family</option>
                            <option {{$room->RoomType == 'Executive' ? 'selected':''}} value="Executive">Executive</option>
                            <option {{$room->RoomType == 'Accessible' ? 'selected':''}} value="Accessible">Accessible</option>
                            <option {{$room->RoomType == 'Spare Rooms' ? 'selected':''}} value="Spare Rooms">Spare Rooms</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-2">
                            <label>
                                Room Number
                            </label>
                            <input type="number" name="room_number" value="{{$room->RoomNumber}}" placeholder="Room Number" class="form-input" />
                        </div>

                        <div class="mt-2">
                            <label>
                                Max Guests
                            </label>
                            <input type="number" name="max_guests" value="{{$room->MaxGuests}}" placeholder="Max Guests" class="form-input" />
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
                            <input type="number" value="{{$room->roomPrice->three_hours}}" name="3h" class="form-input" />
                        </div>
                        <div class="mt-2">
                            <label>
                                6 Hours
                            </label>
                            <input type="number" value="{{$room->roomPrice->six_hours}}" name="6h" class="form-input" />
                        </div>
                        <div class="mt-2">
                            <label>
                                12 Hours
                            </label>
                            <input type="number" value="{{$room->roomPrice->tweleve_hours}}" name="12h" class="form-input" />
                        </div>
                        <div class="mt-2">
                            <label>
                                24 Hours
                            </label>
                            <input type="number" value="{{$room->roomPrice->onedaystay}}" name="24h" class="form-input" />
                        </div>
                     
                    </div>
                    <div class="mt-4">
                        <label for="ctnTextarea">Description</label>
                        <textarea name="description" id="ctnTextarea" rows="3" class="form-textarea" placeholder="Enter Textarea">{{$room->Description}}</textarea>
                    </div>
               
                    <label class="block mt-10">
                        <span class="sr-only">Add Photo</span>
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
                        <a href="{{url('room-details')}}" type="button" class="btn btn-outline-danger" >Discard</a>
                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Submit</button>
                    </div>
                </form>

                
            </div>

            <div class="flex grid grid-cols-4 gap-4 mt-4">
                @if ($room->roomImages)
                    @foreach ($room->roomImages as $key => $image)
                        <div>
                            <div
                                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                                <img class="rounded-t-lg" src="{{ asset($image->images) }}" class="w-[10vh]"
                                    alt="" />

                                <a @if($key === 0) href="javascript:void(0);" class="btn btn-dark mt-4" @else href="{{ url('delete-image/'.$image->id) }}" @endif class="btn btn-danger mt-4">Delete</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
