@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center mt-5">
        <div class="card p-4 col-sm-4 shadow">
            <h4 class="text-center mb-5">Register</h4>
            
            <!-- uses the action to read the php code inside its self file --> 
            <form action="/register" method="POST">
            @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="name@example.com">
                    <label for="fullname">Full name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                    <label for="confirmpassword">Confirm Password</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-dark col-sm-12">Register</button>

                </div>
                <p class="text-center mt-2">Already have an account? <a class="text-decoration-none" href="{{ route('login') }}">Login here.</a></p>
            </form>

        </div>
    </div>
@endsection