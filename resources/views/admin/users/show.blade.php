@extends('admin.layout.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h2>{{ $user->name }}</h2>
                        </div>
                        <div class="card-body px-6 pt-2 pb-2">
                            <div class="mb-3">
                                <p class="font-bold text-lg">Adresse : <br>
                                    <span class="text-gray-700 text-sm">
                                        {{ $user->address }} <br>
                                        {{ $user->zip_code . ' ' . $user->city }}
                                    </span>
                                </p>
                            </div>
                            <div class="mb-3">
                                <p class="font-bold text-lg">E-mail : <br>
                                    <span class="text-gray-700 text-sm">
                                        {{ $user->email }}
                                    </span>
                                </p>
                            </div>
                            <div class="mb-3">
                                <p class="font-bold text-lg">Phone : <br>
                                    <span class="text-gray-700 text-sm">
                                        {{ $user->phone }}
                                    </span>
                                </p>
                            </div>
                            <div class="mb-3">
                                <p class="font-bold text-lg">Nombre de commande : <br>
                                    <span class="text-gray-700 text-sm">
                                        {{ count($user->orders) }}
                                    </span>
                                </p>
                            </div>
                            <div class="mb-3">
                                <p class="font-bold text-lg">CA généré : <br>
                                    <span class="text-gray-700 text-sm">
                                        {{ $user->total_amount_orders->total }}
                                    </span>
                                </p>
                            </div>
                            <div class="mb-3">
                                <p class="font-bold text-lg">Panier moyen : <br>
                                    <span class="text-gray-700 text-sm">
                                        {{ $user->total_amount_orders->total / count($user->orders) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h4>Les commandes passées</h4>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Commande n°</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payée le</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Montant</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total article(s)</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->orders as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $order->order_number }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $order->payed_at }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">{{ $order->total }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $order->total_products->quantity }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $order->status }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $order->status }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('admin.orders.show', $user->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show user">
                                                    Show
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
