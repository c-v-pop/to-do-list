<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>Task List</h1>

    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name="description" placeholder="Add a new task..." required>
        <button type="submit">Add</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                <form method="post" action="{{ route('tasks.update', $task->id) }}">
                    @csrf
                    @method('patch')
                    <label>
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description }}
                    </label>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
