@extends('layouts.user_role')

@section('content')

<!-- TABLE -->
    <div class="row">
        <div class="col">
            <h3>To Do List</h3>
        </div>
        <div class="col d-flex justify-content-end">
            <button class="btn btn-primary mb-2" 
                data-bs-toggle="modal"
                data-bs-target="#addTask">Add a Task</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($todos as $todo)
                <tr>
                    
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $todo->task }}</td>
                    <td>
                        <!-- Insert Edit Button -->
                         <button type="button" class="btn btn-primary btn-sm"
                         data-bs-toggle="modal"
                         data-bs-target="#editModal{{ $todo->id }}">
                            Edit
                        </button>

                        <!-- Delete Button -->
                        <button type="button" class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteTask{{ $todo->id }}">
                            Delete
                        </button>

                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<!-- Add Modal -->
<div class="modal fade" id="addTask" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="/todo">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title">Add To Do</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3">
            <label>To Do</label>
            <input type="text" name="todo" class="form-control" placeholder="Enter task" required>
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Save</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Delete Modal -->
@foreach($todos as $todo)
<div class="modal fade" id="deleteTask{{ $todo->id }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5>Confirm Delete</h5>
      </div>

      <div class="modal-body">
        Are you sure you want to delete this task?
      </div>

      <div class="modal-footer">
        <a href="/deleteToDo/{{ $todo->id }}" class="btn btn-danger">Delete</a>
      </div>

    </div>
  </div>
</div>
@endforeach

<!-- Edit Modal -->
@foreach($todos as $todo)
<div class="modal fade" id="editModal{{ $todo->id }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="/updateTask/{{ $todo->id }}">
        @csrf
        <div class="modal-header">
          <h5>Edit Task</h5>
        </div>

        <div class="modal-body">
          <input type="text" name="task" value="{{ $todo->task }}" class="form-control">
        </div>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Update</button>
        </div>

      </form>

    </div>
  </div>
</div>
@endforeach

@endsection