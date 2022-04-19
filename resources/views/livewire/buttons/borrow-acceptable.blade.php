

<div class="p-2 bg-green-300 rounded">
    <a wire:click="confirmAcceptable" wire:loading.attr="disabled" class="cursor-pointer">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>   
     </a>
    

    <x-jet-dialog-modal wire:model="confirmingAcceptable">
            <x-slot name="title">
                {{ __('Reply to acceptable request') }}
            </x-slot>

            <x-slot name="content">
                <input type="text" class="form-control" placeholder="copy number" wire:model="copy_number">
                @error('copy_number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror    

                <div >
                        <p for="DueDate">Due Date:</p>
                        <input wire:model="DueDate" type="date" id="DueDate" name="DueDate">
                    
                        <!--- Validation -->
                        @error('DueDate')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>
            
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingAcceptable')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="reservationborrow"  wire:loading.attr="disabled">
                    {{ __('Submit') }}
                </x-jet-danger-button>
            </x-slot>
    </x-jet-dialog-modal>

</div>


