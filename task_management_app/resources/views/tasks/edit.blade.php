<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Edit Task</h1>

        <div class="card shadow-sm p-4">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" name="description" id="description" class="form-control"
                        value="{{ $task->description }}" required>
                    {{-- <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea> --}}
                </div>

                <div class="mb-4">
                    <label for="is_completed" class="form-label">Status:</label>
                    <select name="is_completed" id="is_completed" class="form-select">
                        <option value="0" {{ $task->is_completed == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ $task->is_completed == 1 ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update Task</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
