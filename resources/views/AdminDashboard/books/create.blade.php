<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Book') }}
        </h2>
    </x-slot>
    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-jet-nav-link href="{{ route('books.display') }}" :active="request()->routeIs('books.display')">
                {{ __('Index') }}
            </x-jet-nav-link>

            {{-- Create --}}
   <x-jet-nav-link href="{{ route('books.create') }}" :active="request()->routeIs('books.create')">
                {{ __('Create') }}
            </x-jet-nav-link>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="p-6">

                    <x-form action="{{ route('books.store') }}"  has-files >
                        <div class="space-y-6">

                            {{-- Cover Image --}}
                            <div>
                                <x-jet-label for="cover_image" value="{{ __('Cover Image') }}" />
                                <input name="cover_image" type="file" id="cover_image">
                                <span class="mt-2 text-xs text-gray-500">File type:jpg,png only</span>
                                <x-jet-input-error for="cover_image" class="mt-2" />
                            </div>
                            {{-- Title --}}
                            <div>
                                <x-jet-label for="title" value="{{ __('Title') }}" />
                                <x-jet-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
                                <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                                <x-jet-input-error for="title" class="mt-2" />
                            </div>

                            {{-- Category --}}
                            <div>
                                <x-jet-label for="category_id" value="{{ __('Categories') }}" />
                                <select name="category_id" id="category_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    <option value="">Please select a category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="category_id" class="mt-2" />
                            </div>

                            {{-- ُEdition --}}
                            <div>
                                <x-jet-label for="ُEdition" value="{{ __('ُEdition') }}" />
                                <x-jet-input id="edition" class="block w-full mt-1" type="text" name="edition" :value="old('edition')" autofocus autocomplete="edition" />
                                <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                                <x-jet-input-error for="edition" class="mt-2" />
                            </div>

                             {{-- Auther --}}
                             <div>
                                <x-jet-label for="Auther" value="{{ __('Auther') }}" />
                                <x-jet-input id="auther" class="block w-full mt-1" type="text" name="auther" :value="old('auther')" autofocus autocomplete="auther" />
                                <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                                <x-jet-input-error for="auther" class="mt-2" />
                            </div>

                            {{-- Publisher --}}
                            <div>
                                <x-jet-label for="Publisher" value="{{ __('Publisher') }}" />
                                <x-jet-input id="publisher" class="block w-full mt-1" type="text" name="publisher" :value="old('publisher')" autofocus autocomplete="publisher" />
                                <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                                <x-jet-input-error for="publisher" class="mt-2" />
                            </div>


                            
                            {{-- Copies --}}
                            <div>
                                <x-jet-label for="Copies" value="{{ __('Copies') }}" />
                                <x-jet-input id="bcopies" class="block w-full mt-1" type="text" name="bcopies" :value="old('bcopies')" autofocus autocomplete="bcopies" />
                                <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                                <x-jet-input-error for="bcopies" class="mt-2" />
                            </div>



                            {{-- Published at --}}
                            <div>
                                <x-jet-label for="published_at" value="{{ __('Published at') }}" />
                                <x-pikaday name="published_at" format="YYYY-MM-DD" />
                                <x-jet-input-error for="published_at" class="mt-2" />
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
