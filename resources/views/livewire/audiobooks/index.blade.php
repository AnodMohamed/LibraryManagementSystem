<div class="mx-auto max-w-7xl">
    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

        {{-- Main Heading --}}
        <div class="flex w-full p-3 space-x-2">



            {{-- Order By --}}
            <div class="relative w-2/6">
                <select wire:model='orderBy' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="id">ID</option>
                    <option value="created_at">Created At</option>
                </select>
            </div>

            {{-- Order Asc --}}
            <div class="relative w-2/6">
                <select wire:model='orderAsc' id="" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100">
                    <option value="1">Asc</option>
                    <option value="0">Desc</option>
                </select>
            </div>

            {{-- Per Page--}}
            <div class="relative w-2/6">
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
                        Id
                    </th>

                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Book 
                    </th>


                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Featured
                    </th>

                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Created Date
                    </th>


                    <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                
                @foreach ($audiobooks as $audiobook)

                <tr>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $audiobook->id }}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $audiobook->book->title }}
                    </td>



                    <td class="px-2 py-4 whitespace-nowrap">
                        @if($audiobook->featured == '0')
                            Unapproved
                        @elseif($audiobook->featured == '1')
                            Approved
                        @endif
                       
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{ $audiobook->created_at }}
                    </td>


                    <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">

                        <div class="flex justify-start space-x-1">

                            <button wire:click="download({{ $audiobook->id }})">

                               download
                            
                            </button>
                        </div>

                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>

        <div class="p-2 bg-indigo-300">
            {{ $audiobooks->links() }}
        </div>
    </div>
</div>
