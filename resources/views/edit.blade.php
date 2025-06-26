<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ce7f964f6.js" crossorigin="anonymous"></script>
    @vite('resources/css/main.css')
    <title>Edit Task</title>
</head>
<body class="bg-gradient-to-br from-black/70 via-purple-350 to-black/100 min-h-screen flex items-center justify-center">
    <div class="bg-blue-300 bg-opacity-35 p-8 rounded-lg shadow-md lg:w-2/5 sm:w-2/4">
        <h1 class="text-center mb-4 text-2xl font-bold text-white text-shadow-lg">Edit Task</h1>
{{-- Update Form --}}
<form action="{{ route('update', $todolist->id) }}" method="POST" title="Edit your task">
    @csrf
    @method('patch')
    <div class="mb-4 flex">
        <input type="text" name="content" maxlength="70" value="{{ $todolist->content }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        <span class="flex items-center bg-white rounded-md ml-2" title="Select date">
            <label for="deadline" class="justify-center text-red-500 ml-1 font-semibold">Deadline:</label>
            <input type="date" name="deadline" class="text-blue-500 mr-1">
        </span>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 w-full font-semibold" title="Update task">
        Update Task
    </button>
</form>

{{-- Delete Form --}}
<form action="{{ route('destroy', $todolist->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Are you sure you want to delete this task?')">
    @csrf
    @method('delete')
    <button type="submit" class="bg-red-500 text-white p-2 w-full hover:text-black transition-text duration-500 rounded-md" title="Delete Task">
        Delete <i class="fa-solid fa-trash"></i>
    </button>
</form>

    </div>
</body>
</html>
