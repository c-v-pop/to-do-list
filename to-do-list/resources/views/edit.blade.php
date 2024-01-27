<!-- resources/views/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ce7f964f6.js" crossorigin="anonymous"></script>
    @vite('resources/css/main.css')
    <title>Edit Task</title>
</head>
<body class="bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 min-h-screen flex items-center justify-center">
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
