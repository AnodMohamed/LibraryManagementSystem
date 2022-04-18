<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            <x-jet-nav-link href="{{ route('students.index') }}" :active="request()->routeIs('students.index')">
                {{ __('Index') }}
            </x-jet-nav-link>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf

                        <div>
                            <small class="mb-4 text-gray-500">Name </small>
                            <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-jet-input-error for="name" class="mt-2" />

                        </div>

                        <div>
                            <x-jet-label for="name" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('name')" required autofocus autocomplete="email" />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        <div>
                            <x-jet-label for="name" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" :value="old('password')" required />
                            <x-jet-input-error for="password" class="mt-2" />
                        </div>
                        <x-jet-button class="mt-12">
                            {{ __('Create') }}
                        </x-jet-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
