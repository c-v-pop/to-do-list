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
    <div class="bg-white p-8 rounded-lg shadow-md w-2/4">
        <h2 class="text-center text-2xl text-gray-800 mb-4">Edit Task</h2>
        <form action="{{ route('update', $todolist->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-4">
                <label for="content" class="text-gray-600 block">Task:</label>
                <input type="text" name="content" maxlength="70" value="{{ $todolist->content }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Update Task</button>
        </form>
    </div>
</body>
</html>
