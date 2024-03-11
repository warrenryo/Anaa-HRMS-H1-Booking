<x-app-layout>
            <!-- Header -->
            <header class="text-center mb-8">
                <h1 class="text-3xl font-semibold text-gray-800">Appointment</h1>
              </header>

               <!-- button -->
               <div class="flex items-center justify-end">
                <button type="button" class="btn btn-info" @click="toggle">Add Room</button>
            </div>

            <div class="panel w-5/12 ml-20 shadow-orange-800  shadow-md">
                <div class="appoint">
                    <h2 class="text-lg mb-2">
                        Appointment Reminder
                    </h2>

                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Time
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Client Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Service
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                    </div>

                </div>
            </div>

            <div class="panel">

            </div>
              
</x-app-layout>