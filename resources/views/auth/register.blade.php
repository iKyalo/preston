@extends('layouts.default')

@section('content')
    <div class="register-container">
        <h2>Create an account</h2>
        <form method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="register-name">Name</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="Enter your name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" class="form-control" id="register-email" name="email"
                    placeholder="Enter your email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="register-phone">Phone</label>
                <input type="tel" class="form-control" id="register-phone" name="phone"
                    placeholder="Enter your phone number">
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            <div class="form-group password-group">
                <label for="register-password">Password</label>
                <input type="password" class="form-control" id="register-password" name="password"
                    placeholder="Enter your password">
                <br />
                <label for="register-confirm-password">Confirm Password</label>
                <input type="password" class="form-control" id="register-confirm-password" name="password_confirmation"
                    placeholder="Confirm your password">
            </div>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
