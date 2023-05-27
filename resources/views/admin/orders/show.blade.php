@extends('admin.layout.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Commande n°{{ $order->order_number }}</h6>
                    </div>
                    <div class="card-body px-6 pt-2 pb-2">
                        <div class="h-screen bg-gray-100 pt-20">
                            <!-- Sub total -->
                            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                                <div class="mb-2 flex justify-between">
                                    <p class="text-gray-700">Subtotal</p>
                                    <p class="text-gray-700">{{ $order->total }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-gray-700">Shipping</p>
                                    <p class="text-gray-700">4.99 €</p>
                                </div>
                                <hr class="my-4" />
                                <div class="flex justify-between">
                                    <p class="text-lg font-bold">Total</p>
                                    <p class="mb-1 text-lg font-bold"> {{ $order->total + 4.99 }}</p>
                                    <p class="text-sm text-gray-700">including TVA</p>
                                </div>
                            </div>
                            <h1 class="mt-4 text-center text-2xl font-bold">Cart Items</h1>
                            <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                                <div class="rounded-lg md:w-2/3 d-flex">
                                    @foreach ($order->products as $item)
                                        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start col-3">
                                            <img src="{{ url('storage/' . $item->img) }}" alt="product-image" class="rounded-lg sm:w-40" style="width: 100%"/>
                                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                                <div class="mt-5 sm:mt-0">
                                                    <h2 class="text-lg font-bold text-gray-900">{{ $item->name }}</h2>
                                                </div>
                                                <div class="mt-4  sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                                    <p class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600">
                                                        Quantité : {{ $item->quantity }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

