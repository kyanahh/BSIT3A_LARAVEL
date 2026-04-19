@extends('layouts.user_role')

@section('content')

<h1>Welcome, {{ session('user')->name }}</h1>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5>Total Users</h5>
                <h2>{{ $userCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5>Total To-Do List</h5>
                <h2>{{ $todoCount }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-6">
        <canvas id="myChart"></canvas>
    </div>

</div>

@endsection

@section('scripts')
<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Users', 'Tasks'],
        datasets: [{
            label: 'System Data',
            data: [{{ $userCount }}, {{ $todoCount }}],
        }]
    }
});
</script>

@endsection