@extends('layouts.user_role')

@section('content')

<h3 class="mt-5">User Management</h3>

<form action="/users" method="POST">
    @csrf
<div class="row p-3">
    <div class="col">
        <div>
            <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Enter Full name">
        </div>
    </div>
    <div class="col">
        <div>
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter email">
        </div>
    </div>
    <div class="col">
        <div>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter password">
        </div>
    </div>
    <div class="col">
        <div>
            <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm password">
        </div>
    </div>
    <div class="col">
        <button class="btn btn-primary px-5" type="submit">Save</button>
    </div>
</div>
</form>

<!-- TABLE -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Insert Edit Button -->
                         <button type="button" class="btn btn-primary btn-sm">
                            Edit
                        </button>

                        <!-- Delete Button -->
                        <button type="button" class="btn btn-danger btn-sm">
                            Delete
                        </button>

                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection