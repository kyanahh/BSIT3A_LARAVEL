@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-center mt-5">
        <div class="card p-4 col-sm-4 shadow">
            <h4 class="text-center mb-5">Login</h4>
                
            <form action="/login" method="POST">
            @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div>
                    <button class="btn btn-dark col-sm-12" type="submit">Login</button>
                </div>
                <p class="text-center mt-2">Don't have an account yet? <a class="text-decoration-none" href="{{ route('register') }}">Register here.</a></p>
            </form>
        </div>
    </div>

@endsection