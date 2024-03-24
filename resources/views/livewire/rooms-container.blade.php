<div class="w-full flex flex-col justify-center items-center">
    <form role="search" class='mt-6'>
        <input
            wire:model.live.debounce.100ms="search"
            class="text-md text-white border border-solid border-gray-500 bg-gray-600 rounded-md p-3 w-[420px]"
            type="search"
            placeholder="Search room name"
        >
    </form>

    <div class="grid grid-cols-3 gap-4 w-full">
        @if (count($rooms) > 0) @foreach ($rooms as $room)
                <div class="w-full rounded-lg shadow-sm px-2 py-4">
                    <img
                        src="{{ 'storage/' . $room->image}}"
                        alt="{{ $room->name . ' Picture'}}"
                        class="w-full max-h-[180px] object-cover rounded-sm"
                    >
                    <div class="flex items-center justify-between mt-4">
                        <h2 class="text-xl font-semibold">{{ $room->name }}</h2>
                        <div class="border-2 border-solid border-red-500 text-red-500 rounded-md p-1">
                            <span class="text-md">Fully Booked</span>
                        </div>
                    </div>
                    <div class="mt-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span class="text-sm">{{ 'Capacity '.$room->capacity }}</span>
                    </div>
                    <p class="text-sm text-justify mt-4">{{ $room->description }}</p>
                </div>
            @endforeach
        @else
            <p>No rooms found.</p>
        @endif
    </div>
</div>
