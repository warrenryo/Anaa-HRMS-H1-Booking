<x-app-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    

<!--CONTAINER-->

    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="p-6 bg-gradient-to-b from-blue-200 to-blue-700 rounded-lg shadow-lg text-white">
                <h2 class="text-xl font-semibold mb-4">{{$booking}}</h2>
                <p>New Booking.</p>
            </div>
            <!-- Card 2 -->
            <div class="p-6 bg-gradient-to-b from-green-500 to-emerald-400 rounded-lg shadow-lg text-white">
                <h2 class="text-xl font-semibold mb-4">[numbers]</h2>
                <p>Schedule Room.</p>
            </div>
            <!-- Card 3 -->
            <div class="p-6 bg-gradient-to-b from-purple-400  to-purple-700 rounded-lg shadow-lg text-white">
                <h2 class="text-xl font-semibold mb-4">[numbers]</h2>
                <p>Check In.</p>
            </div>
            <!-- Card 4 -->
            <div class="p-6 bg-gradient-to-b from-yellow-300 to-amber-400 rounded-lg shadow-lg text-white">

                <h2 class="text-xl font-semibold mb-4">[numbers]</h2>
                <p>Check Out.</p>
            </div>
        </div>
    </div>
    <!--TIMELINE-->


    <!--Task-->
    
    <!--START PANEL-->
    <div class="container mx-auto">
        <!-- Grid with 1 row and 2 columns -->
        <div class="grid grid-cols-2 gap-4">
            <!-- Panel 1 -->
            <div class="bg-white shadow-md p-4 rounded-xl">
                <h2 class="text-xl font-semibold mb-2">Activity Logs</h2>
                
                
                <!--activity logs-->

                <div class="w-90 flex justify-start">
                    <div class="flex">
                        <p class="text-[#3b3f5c] dark:text-white-light min-w-[58px] max-w-[100px] text-base font-semibold py-2.5">10:00</p>
                        <div class="relative before:absolute before:left-1/2 before:-translate-x-1/2 before:top-[15px] before:w-2.5 before:h-2.5 before:border-2 before:border-primary before:rounded-full after:absolute after:left-1/2 after:-translate-x-1/2 after:top-[25px] after:-bottom-[15px] after:w-0 after:h-auto after:border-l-2 after:border-primary after:rounded-full"></div>
                        <div class="p-2.5 self-center ltr:ml-2.5 rtl:ltr:mr-2.5 rtl:ml-2.5">
                            <p class="text-[#3b3f5c] dark:text-white-light font-semibold text-[13px]">Updated Server Logs</p>
                            <p class="text-white-dark text-xs font-bold self-center min-w-[100px] max-w-[100px]">25 mins ago</p>
                            </div>
                    </div>
                    </div>





            </div>
            <!-- Panel 2 -->
            <div class="bg-white shadow-md p-4 rounded-xl">
                <h2 class="text-xl font-semibold mb-2">Latest Reviews</h2>
                <p>This is the content of panel 2.</p>
            </div>
        </div>
    </div>
    <!--END PANEL-->


          
    </div>

   
</x-app-layout>
