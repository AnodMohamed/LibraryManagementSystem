
<div class="mx-auto max-w-7xl">
    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

        {{-- Main Heading --}}
        <div class="flex w-full p-3 space-x-2">

            {{-- Search Box --}}
            <div class="w-3/6">

                <span class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal leading-snug text-center text-gray-400 bg-transparent rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input wire:model.debounce.300ms='search' type="text" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100" placeholder="Search borrow id ">
            </div>
            {{-- Order By --}}
            <div class="relative w-1/6">
                <select wire:model='orderBy' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="id">ID</option>
                    <option value="created_at">Created At</option>
                </select>
            </div>

            {{-- Order Asc --}}
            <div class="relative w-1/6">
                <select wire:model='orderAsc' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="1">Asc</option>
                    <option value="0">Desc</option>
                </select>
            </div>

            {{-- Per Page --}}
            <div class="relative w-1/6">
                <select wire:model='perPage' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

        </div>

        {{-- Table --}}

                    <table class="w-full divide-y divide-gray-200">

                        <thead class="font-bold text-gray-500 bg-indigo-200">
                            <tr>
                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Id
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Book
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Status
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                            @foreach ($borrows as $borrow)

                            <tr>
                                <td class="px-2 py-4 whitespace-nowrap">
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $borrow->id }}
                                </td>


                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $borrow->book->title }}
                                </td>

                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $borrow->status }}
                                </td>
                                <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <div class="flex justify-start space-x-1">
                                        
                                        <a href="{{ route('AppointmentPage', $borrow) }}" class="p-1 border-2 border-indigo-00 rounded-md bg-blue-300">
                                            <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" stroke-width="2"  viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        {{-------
                                        <livewire:buttons.borrow-pending :pending="$borrow" :key="$borrow->id" />
-------}}

                                    </div>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
              
       
    </div>
</div>
