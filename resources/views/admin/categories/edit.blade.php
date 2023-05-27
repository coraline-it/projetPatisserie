@extends('admin.layout.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Nom de la catégorie">
                        @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10">
                            {{ $category->description }}
                        </textarea>
                        @if($errors->has('description'))
                            <div class="error">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" id="deleteForm">
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
