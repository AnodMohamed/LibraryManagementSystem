<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Audio books') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-jet-nav-link href="{{ route('audiobooks.index') }}" :active="request()->routeIs('audiobooks.index')">
                {{ __('Index') }}
            </x-jet-nav-link>

            {{-- Create --}}
            <x-jet-nav-link href="{{ route('audiobooks.create') }}" :active="request()->routeIs('audiobooks.create')">
                {{ __('Create') }}
            </x-jet-nav-link>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="p-6">

                    <x-form action="{{ route('audiobooks.store') }} "  has-files>
                        <div class="space-y-6">

                            {{-- Audio --}}
                            <div>
                                <x-jet-label for="audio" value="{{ __('Audio') }}" />
                                <input name="audio" type="file" id="audio">
                                <span class="mt-2 text-xs text-gray-500">Mp3</span>
                                <x-jet-input-error for="audio" class="mt-2" />
                            </div>


                            {{-- Books --}}
                            <div>
                                <x-jet-label for="book_id" value="{{ __('Books') }}" />
                                <select name="book_id" id="book_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    <option value="">Please select a book</option>
                                    @foreach ($books as $book )
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="book_id" class="mt-2" />
                            </div>

                        </div>


                        <x-jet-button class="mt-12">
                            {{ __('Create') }}
                        </x-jet-button>

                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
