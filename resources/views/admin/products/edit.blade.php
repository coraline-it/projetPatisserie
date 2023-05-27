@extends('admin.layout.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="product-image">Image</label>
                        <input type="file" class="form-control" id="product-image" name="img" accept="image/png, image/jpeg" onchange="preview()">
                        <div id="clearImage" class="btn btn-primary mt-3">Click me</div>
                        @if($errors->has('img'))
                            <div class="error">{{ $errors->first('img') }}</div>
                        @endif
                    </div>
                    <img id="frame" src="{{ $product->img ? url('storage/' . $product->img) : "" }}" class="img-fluid w-20" />

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Nom du produit">
                        @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10">
                            {{ $product->description }}
                        </textarea>
                        @if($errors->has('description'))
                            <div class="error">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="category">Catégorie</label>
                        <select name="category_id" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" selected="{{ $product->category_id === $category->id ? true : false }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <div class="error">{{ $errors->first('category_id') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantité</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" placeholder="Quantité du produit">
                        @if($errors->has('quantity'))
                            <div class="error">{{ $errors->first('quantity') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="price">Prix unitaire</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" placeholder="PU">
                        @if($errors->has('price'))
                            <div class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" id="confirmDelete">Supprimer</button>
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
@stop
