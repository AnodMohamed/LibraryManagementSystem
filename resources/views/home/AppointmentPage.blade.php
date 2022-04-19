<x-base-layout>
    <!--Hero-->
  
    <section class="py-8 bg-white border-b">
        <div class="container max-w-5xl m-8 mx-auto">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Borrow Details
            </h1>
            <div class="w-full mb-4">
                <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-5/6 p-6 sm:w-1/2">
                    <h5 class="mb-3 text-3xl font-bold leading-none text-gray-800">
                       Student name
                    </h5>
                    <p class="mb-8 text-gray-600">
                     {{ $borrowdetails->student->name}}                       
                    </p>
                    <h5 class="mb-3 text-3xl font-bold leading-none text-gray-800">
                        Book title
                    </h5>
                    <p class="mb-8 text-gray-600">
                      {{ $borrowdetails->book->title}}                       
                     </p>
                     <h5 class="mb-3 text-3xl font-bold leading-none text-gray-800">
                        Borrow id
                     </h5>
                     <p class="mb-8 text-gray-600">
                      {{ $borrowdetails->id}}                       
                     </p> 
                     <h5 class="mb-3 text-3xl font-bold leading-none text-gray-800">
                        Borrow Status
                     </h5>
                     <p class="mb-8 text-gray-600">
                      {{ $borrowdetails->status}}                       
                     </p> 
                </div>
                <div class="w-5/6 p-6 sm:w-1/2">
                    <h5 class="mb-3 text-3xl font-bold leading-none text-gray-800">
                       Student copy number
                    </h5>
                    <p class="mb-8 text-gray-600">
                        @if (  $borrowdetails->copy_number != Null)
                            {{ $borrowdetails->copy_number }}                     
                        @else
                            Empty
                        @endif
                     </p> 
                    <h5 class="mb-3 text-3xl font-bold leading-none text-gray-800">
                        Book release date
                    </h5>
                     <p class="mb-8 text-gray-600">
                        @if ( $borrowdetails->releaseDate != Null)
                            {{ $borrowdetails->releaseDate }}                     
                        @else
                            Empty
                        @endif
                     </p> 
                     <h5 class="mb-3 text-3xl font-bold leading-none text-gray-800">
                        Borrow due date
                     </h5>
                     <p class="mb-8 text-gray-600">
                        @if ( $borrowdetails->DueDate != Null)
                            {{ $borrowdetails->DueDate}}                       
                        @else
                            Empty
                        @endif
                     </p> 
                     <h5 class="mb-3 text-3xl font-bold leading-none text-gray-800">
                        QrCode 
                     </h5>
                     <p class="mb-8 text-gray-600">
                        {{ QrCode::generate('Make me into a QrCode!')  }}            
                    </p> 
                </div>
            </div>

        </div>
    </section>




</x-base-layout>
