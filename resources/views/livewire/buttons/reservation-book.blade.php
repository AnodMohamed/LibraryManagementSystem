<div class="p-2 bg-green-300 rounded">
    <a wire:click="confirmReservation" wire:loading.attr="disabled" class="cursor-pointer">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>    </a>
    
    <x-jet-dialog-modal wire:model="confirmingReservation">
        <x-slot name="title">
            {{ __('Reservation Book') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to Reservation your this Book?') }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingReservation')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="reservationBook" wire:loading.attr="disabled">
                {{ __('Make Reservation Book') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
