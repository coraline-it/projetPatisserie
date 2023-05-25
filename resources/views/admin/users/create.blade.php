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
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'utilisateur">
                        @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="first_name">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Prénom de l'utilisateur">
                        @if($errors->has('first_name'))
                            <div class="error">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email de l'utilisateur">
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe de l'utilisateur">
                        @if($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Confirmation du mot de passe</label>
                        <input id="password" class="form-control" type="password" name="password_confirmation" placeholder="Confirmation du mot de passe" required>
                        @if($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="address">Adresse</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Adresse de l'utilisateur">
                        @if($errors->has('address'))
                            <div class="error">{{ $errors->first('address') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="city">Ville</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Ville de l'utilisateur">
                        @if($errors->has('city'))
                            <div class="error">{{ $errors->first('city') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="zip_code">Code postal</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Code postal de l'utilisateur">
                        @if($errors->has('zip_code'))
                            <div class="error">{{ $errors->first('zip_code') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Téléphone de l'utilisateur">
                        @if($errors->has('phone'))
                            <div class="error">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>

                    @if(auth()->user()->hasRole('superAdmin'))
                        <div class="form-group">
                            <label for="role">Rôle</label>
                            <select class="form-control" id="role" name="role">
                                <option value="user">Utilisateur</option>
                                <option value="superAdmin">Super admin</option>
                                <option value="admin">Admin</option>
                            </select>
                            @if($errors->has('role'))
                                <div class="error">{{ $errors->first('role') }}</div>
                            @endif
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
@stop
