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
                <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ $user->name }}">
                        @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="User First Name" value="{{ $user->first_name }}">
                        @if($errors->has('first_name'))
                            <div class="error">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"value="{{ $user->email }}">
                        @if($errors->has('first_name'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $user->phone }}">
                        @if($errors->has('phone'))
                            <div class="error">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        @if($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Repeat Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation"value="{{ $user->password_confirmation }}">
                        @if($errors->has('password_confirmation'))
                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="phone">Adress</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Adress"value="{{ $user->address }}">
                        @if($errors->has('adress'))
                            <div class="error">{{ $errors->first('adress') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="zip_code">Zip Code</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip code"value="{{ $user->zip_code }}">
                        @if($errors->has('zip_code'))
                            <div class="error">{{ $errors->first('zip_code') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $user->city }}">
                        @if($errors->has('city'))
                            <div class="error">{{ $errors->first('city') }}</div>
                        @endif
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop
