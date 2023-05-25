@extends('admin.layout.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" class="form-control" id="img" name="img" placeholder="Image du produit" accept="image/png, image/jpeg">
                        @if($errors->has('img'))
                            <div class="error">{{ $errors->first('img') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom du produit">
                        @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                        @if($errors->has('description'))
                            <div class="error">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="category">Catégorie</label>
                        <select name="category_id" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <div class="error">{{ $errors->first('category_id') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantité</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantité du produit">
                        @if($errors->has('quantity'))
                            <div class="error">{{ $errors->first('quantity') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="price">Prix unitaire</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="PU">
                        @if($errors->has('price'))
                            <div class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop
