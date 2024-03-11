

@props(['events'])

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="flex items-center justify-between p-4 bg-gray-200">
        <div class="font-bold text-lg">{{ now()->format('F Y') }}</div>
        <div>
            <button class="px-2 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Today</button>
        </div>
    </div>

    <div class="grid grid-cols-7 text-center border-t border-l">
        @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
            <div class="p-2 border-b border-r">{{ $day }}</div>
        @endforeach
    </div>

    <div class="grid grid-cols-7">
        @foreach($events as $date => $event)
            <div class="p-2 border-b border-r">
                <div>{{ $date }}</div>
                @foreach($event as $e)
                    <div>{{ $e }}</div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
