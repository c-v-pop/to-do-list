<!-- resources/views/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h2>Edit Task</h2>
    <form action="{{ route('update', $todolist->id) }}" method="POST">
        @csrf
        @method('patch')
        <label for="content">Task:</label>
        <input type="text" name="content" value="{{ $todolist->content }}">
        <button type="submit">Update Task</button>
    </form>
</body>
</html>
