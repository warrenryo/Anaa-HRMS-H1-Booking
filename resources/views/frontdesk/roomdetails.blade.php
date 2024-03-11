<x-app-layout>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Room Information</span>
        </li>
    </ul>
    <div class="panel mt-4">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Room Type ID</th>
                        <th>Price Per 3 hours</th>
                        <th>Price Per 6 hours</th>
                        <th>Price Per 12 hours</th>
                        <th>Price Per 24 hours</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($room as $rooms)
                        <tr>
                            <td>
                                <img src="{{ asset($rooms->roomImages[0]->images) }}" class="w-32" alt="">
                            </td>
                            <td>{{ $rooms->RoomTypeID }}</td>
                            <td><i class="fa-solid fa-peso-sign"></i> {{ $rooms->roomPrice->three_hours }}</td>
                            <td><i class="fa-solid fa-peso-sign"></i> {{ $rooms->roomPrice->six_hours }}</td>
                            <td><i class="fa-solid fa-peso-sign"></i> {{ $rooms->roomPrice->tweleve_hours }}</td>
                            <td><i class="fa-solid fa-peso-sign"></i> {{ $rooms->roomPrice->onedaystay }}</td>
                            <td>
                                <button data-hs-overlay="#description{{$rooms->id}}" class="btn btn-primary" type="button">
                                    View Description
                                </button>
                                <div id="description{{$rooms->id}}"
                                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                    <div
                                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
                                        <div
                                            class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                            <div
                                                class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                <h3 class="font-bold text-gray-800 dark:text-white">
                                                    Description
                                                </h3>
                                                <button type="button"
                                                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                    data-hs-overlay="#description{{$rooms->id}}">
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
                                                <p>{{$rooms->Description}}</p>
                                            </div>
                                            <div
                                                class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                <button type="button"
                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                    data-hs-overlay="#description{{$rooms->id}}">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
