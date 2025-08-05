<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Tab</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="mb-4 text-center">Task List</h1>

        <div class="mb-3 text-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Create Task</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    <form action="{{ route('tasks.toggleStatus', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        @if ($task->is_completed)
                                            <button type="submit" class="btn btn-sm btn-success">Mark as
                                                Pending</button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-warning">Mark as
                                                Completed</button>
                                        @endif
                                    </form>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                        class="btn btn-sm btn-info me-2">Edit</a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No tasks found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
