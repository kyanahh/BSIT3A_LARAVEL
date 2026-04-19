<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">My Dashboard</a>
        <div>
            <a href="{{ route('users') }}" class="btn btn-outline-light btn-sm">Users</a>
            <a href="{{ route('todo') }}" class="btn btn-outline-light btn-sm">To Do</a>
            <a href="{{ route('user_account')}}" class="btn btn-outline-light btn-sm">Profile</a>
            <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>