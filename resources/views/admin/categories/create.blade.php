@extends('admin.layout.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Nom de la catégorie">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop
