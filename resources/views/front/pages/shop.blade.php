@extends('front.layouts.app')

@section('content')
    @foreach($products as $product)
        <section class="product">
            <div class="product__photo">
                <div class="photo-container">
                    <div class="photo-main">
                        <div class="controls">
                            <i class="material-icons">share</i>
                            <i class="material-icons">favorite_border</i>
                        </div>
                        <img src="{{ url('storage/' . $product->img) }}">
                    </div>
                </div>
            </div>
            <div class="product__info">
                <div class="title">
                    <h1>{{ $product->name }}</h1>
                </div>
                <div class="price">
                    € <span>{{ $product->price }}</span>
                </div>
                <form action="{{ route('front.cart.store') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <input type="hidden" value="{{ $product->name }}" name="name">
                    <input type="hidden" value="{{ $product->price }}" name="price">
                    <input type="hidden" value="{{ $product->image }}"  name="image">
                    <input type="hidden" value="1" name="quantity">
                    <button class="buy--btn">Ajouter au panier</button>
                </form>
            </div>
        </section>
    @endforeach
@stop
