@extends('layouts.user_role')

@section('content')

<h2>My Profile</h2>

<form method="POST" action="/updateProfile" enctype="multipart/form-data">
@csrf
    <div class="row">
        
        <div class="col-sm-3 card p-3 me-3 text-center">
            <div class="mb-3">
                <label>Profile Picture</label><br>

                @if(session('user')->profile_pic)
                    <img src="/uploads/{{ session('user')->profile_pic }}" class="rounded-circle img-fluid mb-3 mx-auto" width="200"><br>
                @else
                    <img src="/images/default.jpg" class="rounded-circle img-fluid mb-3 mx-auto" width="200"><br>
                @endif

                <input type="file" name="profile" class="form-control">
            </div>
        </div>

        <div class="col card p-5">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ session('user')->name }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ session('user')->email }}" class="form-control">
            </div>

            <button class="btn btn-primary" type="submit">Update Profile</button>
            
        </div>
    </div>

</form>

@endsection