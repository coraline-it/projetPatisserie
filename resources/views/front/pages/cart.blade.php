@extends('front.layouts.app')

@section('content')
    <div class="h-screen bg-gray-100 pt-20">
        <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @foreach ($cartItems as $item)
                    <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                        <img src="{{ url('storage/' . $item->attributes->image) }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-0">
                                <h2 class="text-lg font-bold text-gray-900">{{ $item->name }}</h2>
                            </div>
                            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="flex items-center border-gray-100">
                                    <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                                    <input type="text" name="quantity" value="{{ $item->quantity }}" min="1"
                                           class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600"/>
                                    <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <p class="text-sm">{{ $item->price }} €</p>
                                        <form action="{{ route('front.cart.remove') }}" method="POST" id="deleteForm">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button type="submit" id="confirmDelete"
                                                    class="px-4 py-2 shadow rounded-full">x</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="flex justify-center">
                        @if(count($cartItems) > 0)
                            <form action="{{ route('front.cart.clear') }}" method="POST" id="clearForm">
                                @csrf
                                <button type="submit" class="text-italic font-lg font-bold underline hover:text-red-400" id="confirmClear">Vider mon panier</button>
                            </form>
                        @else
                            <p class="font-xl">Votre panier est vide</p><br>
                            <a href="{{ route('front.shop') }}">Retourner au magasin</a>
                        @endif
                    </div>
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Subtotal</p>
                    <p class="text-gray-700">$129.99</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-gray-700">Shipping</p>
                    <p class="text-gray-700">$4.99</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Total</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold">$134.98 USD</p>
                        <p class="text-sm text-gray-700">including VAT</p>
                    </div>
                </div>
                <form action="{{ route('front.cart.validate') }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('footer-script')
    {{-- DELETE CARD ITEM SCRIPT --}}
    <script type="text/javascript">
        let confirmDeleteButton = document.getElementById('confirmDelete');
        if(confirmDeleteButton) {
            confirmDeleteButton.addEventListener('click', (e) => {
                let form =  document.getElementById('deleteForm');
                e.preventDefault();
                Swal.fire({
                    title: `Etes-vous sûr de vouloir supprimer ce document ?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            })
        }
    </script>

    {{-- CLEAR CARD SCRIPT --}}
    <script>
        let confirmClearButton = document.getElementById('confirmClear');
        if(confirmClearButton) {
            confirmClearButton.addEventListener('click', (e) => {
                let form =  document.getElementById('clearForm');
                e.preventDefault();
                Swal.fire({
                    title: `Etes-vous sûr de vouloir supprimer cet article ?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            })
        }
    </script>
@stop
