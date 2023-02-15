@extends('layouts.default')

@section('content')
    <div class="register-container">
        <h2>Sign in to your account</h2>
        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" name="email" class="form-control" id="register-email" placeholder="Enter your email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group password-group">
                <label for="register-password">Password</label>
                <input type="password" name="password" class="form-control" id="register-password"
                    placeholder="Enter your password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
