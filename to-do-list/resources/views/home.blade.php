<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ce7f964f6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sue+Ellen+Francisco&display=swap" rel="stylesheet">
    @vite('resources/css/main.css')
    <title>Todo List</title>
</head>

<body class="bg-gradient-to-r from-pink-500 via-purple-350 to-indigo-500 min-h-screen flex items-center justify-center">
    <div class="w-full sm:w-4/5 md:w-3/5 lg:w-2/5 xl:w-2/5">
        <div class="w-full">
            <h1 class="text-center text-white text-6xl">To-Do List</h1>
            <form action="{{ route('store') }}" method="POST" autocomplete="off" class="p-2">
                @csrf

                <div class="flex flex-row justify-between p-2">
                    <input type="text" name="content" maxlength="70" placeholder="Add your Task" class="p-2 w-3/4 rounded-tl-md rounded-bl-md" required />
                    <span>
                        <button type="submit" class="bg-blue-500 text-white p-2 w-auto h-full hover:bg-pink-500 transition-text duration-300 ease-in-out rounded-tr-md rounded-br-md">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </span>
                    <span class="flex items-center bg-white rounded-md ml-2">
                        <label for="deadline" class="justify-center text-red-500 ml-1 font-semibold">Deadline:</label>
                        <input type="date" name="deadline" class="text-blue-500 mr-1">
                    </span>
                </div>
            </form>
            <!-- If Task list code starts -->

            @if(count($todolists))
            <ul class="flex flex-col">
            <form action="{{ route('index') }}" method="GET" class="flex flex-row items-center justify-between p-2 bg-white mx-4 mb-2 rounded-md">
                <div class="input-group w-full flex justify-between items-center">
                    <input type="text" name="search" class="form-control p-2 w-full rounded-tl-md rounded-bl-md" placeholder="Search for a task" />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-secondary text-blue-500 font-bold hover:scale-110 hover:text-green-500 transition-text duration-500 ease-out ml-auto">
                            <i class="fa-solid fa-magnifying-glass text-xl mr-6 hover:text-black transition-text duration-500 hover:scale-125"></i>
                        </button>
                    </span>
                </div>
            </form>
                @foreach($todolists as $todolist)
                @unless($todolist->completed)
                <li class="flex flex-row items-center justify-between p-2 bg-gradient-to-r from-blue-200 via-purple-150 to-blue-100 mx-4 mb-2 rounded-md">
                    <span class="mr-auto">{{ $todolist->content }}</span>
                    <form action="{{ route('complete', $todolist->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="h-full">
                            <p class="text-blue-500 ml-7 mr-2 font-bold hover:scale-110 hover:text-green-500 transition-text duration-500 ease-out">Mark as complete</p>
                        </button>
                    </form>

                    
                    <!-- Edit Form -->

                    <form action="{{ route('edit', $todolist->id) }}" method="GET">
                        <button type="submit" class="bg-blue-500 text-white p-2">
                            <i class="fa-solid fa-pencil hover:text-black transition-text duration-500 hover:scale-125"></i>
                        </button>
                    </form>

                    <!-- Delete Form -->

                    <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-500 text-white p-2">
                            <i class="fa-solid fa-trash hover:text-black transition-text duration-500 hover:scale-125"></i>
                        </button>
                    </form>
                </li>
                @endunless
                @endforeach
            </ul>
            @else
            <p class="text-white p-2 text-center text-2xl">No Tasks!</p>
            @endif
            <!-- If Task list code Ends -->
        </div>

        @if(count($todolists))
        <div>
            <h2 class="text-white p-2 text-center font-bold">You have {{ $todolists->where('completed', false)->count() }} pending tasks</h2>
        </div>
        @else
        <!-- Display nothing -->
        @endif
    </div>
</body>

</html>
