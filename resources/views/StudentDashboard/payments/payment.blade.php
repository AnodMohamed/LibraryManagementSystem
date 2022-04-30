
<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Fines') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Unpaid --}}
            <x-jet-nav-link href="{{ route('payments.fine') }}" :active="request()->routeIs('payments.fine')">
                {{ __('Unpaid') }}
            </x-jet-nav-link>

            {{-- paid --}}
            <x-jet-nav-link href="{{ route('payments.paid') }}" :active="request()->routeIs('payments.paid')">
                {{ __('Paid') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
        <x-ui.alerts />
    </div>

    <div class="max-w-3xl mx-auto ">
    <form
    class="bg-white p-5 rounded-md"
        role="form"

        action="{{ route('payments.stripePost') }}"

        method="POST"

        class="require-validation"

        id="require-validation"

        data-cc-on-file="false"

        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
        id="payment-form">

@csrf

<input type="hidden" name="amount" value="{{$unpaid->fine}}">
<input type="hidden" name="reversion_id" value="{{$unpaid->id}}">

<div class='form-row row'>

<div class='my-3 col-xs-12 form-group required'>

    <label class='control-label'>Name on Card</label>
     <input name="card_name"  id="card_name" class='rounded-md px-3 py-2' size='4' type='text'>

</div>

</div>



<div class='form-row row'>

<div class='my-3 col-xs-12 form-group card required'>

    <label class='control-label'>Card Number</label> <input

        autocomplete='off' name="card_number" class='rounded-md px-3 py-2 card-number' size='20'
        id="card_number"

        type='text'>

</div>

</div>



<div class='form-row row'>

<div class='my-3 col-xs-12 col-md-4 form-group cvc required'>

    <label class='control-label'>CVC</label> <input autocomplete='off'
            name="card_cvc"
        class='rounded-md px-3 py-2 card-cvc' placeholder='ex. 311' size='4'
        id="card_cvc"

        type='text'>

</div>

<div class='my-3 col-xs-12 col-md-4 form-group expiration required'>

    <label class='control-label'>Expiration Month</label> <input
            name="exp_month"
        class='rounded-md px-3 py-2 card-expiry-month' placeholder='MM' size='2'
        id="exp_month"

        type='text'>

</div>

<div class='my-3 col-xs-12 col-md-4 form-group expiration required'>

    <label class='control-label'>Expiration Year</label> <input
        name="exp_year"
        id="exp_year"

        class='rounded-md px-3 py-2 card-expiry-year' placeholder='YYYY' size='4'

        type='text'>

</div>

</div>



<div class="flex">
<button class="px-4  mx-4 rounded-md py-1 font-medium bg-indigo-400 hover:bg-indigo-600 transition-all duration-200" type="submit">Pay Now </button>
<button class="px-4  rounded-md py-1 font-medium bg-green-400 hover:bg-green-600 transition-all font-semibold duration-200" type="button">
${{$unpaid->fine}}
 </button>
</div>



</form>
    </div>

</x-app-layout>
