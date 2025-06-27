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
<body class="bg-gradient-to-br from-black/70 via-purple-350 to-black/100 min-h-screen flex items-center justify-center">
   <div class="w-full sm:w-4/5 md:w-3/5 lg:w-2/5 xl:w-2/5">
      <div class="w-full">
         <h1 class="text-center text-white/90 font-bold text-6xl">To-Do List</h1>
         <form action="{{ route('store') }}" method="POST" autocomplete="off" class="p-2">
            @csrf
            <div class="flex flex-col md:flex-row justify-between p-2 gap-2 md:gap-0 text-xs">
               <input type="text" name="content" maxlength="70" placeholder="Add your Task" class="p-2 w-full md:w-3/4 md:rounded-l-md" required />
               
               <!-- Wrap the two spans in a responsive flex container -->
               <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto">
                  <span>
                     <button type="submit" class="bg-blue-500/50 text-white p-2 w-full md:w-auto hover:bg-blue-500 transition duration-300 ease-in-out md:rounded-r-md" title="Add task">
                        <i class="fa-solid fa-plus"></i>
                     </button>
                  </span>
                  
                  <span class="flex items-center bg-white text-xs w-full md:w-auto" title="Select date">
                     <label for="deadline" class="text-red-500 ml-1 font-semibold py-3">Deadline:</label>
                     <input type="date" name="deadline" class="text-blue-500 mr-1 w-full md:w-auto">
                  </span>
               </div>
            </div>
            
         </form>
         <!-- If Task list code starts -->
         @if(count($todolists))
         <ul class="flex flex-col">
            <form action="{{ route('todolists.search') }}" method="GET" class="flex flex-row items-center justify-between p-2 bg-white mx-4 mb-2 rounded-md">
               <div class="input-group w-full flex justify-between items-center" title="Search for an existing task">
                  <input type="text" name="search" class="form-control w-full rounded-tl-md rounded-bl-md text-xs" placeholder="Search for a task" autocomplete="off" />
                  <span class="input-group-btn">
                     <button type="submit" class="btn btn-secondary text-blue-500 font-bold hover:scale-110 hover:text-green-500 transition-text duration-500 ease-out ml-auto">
                        <i class="fa-solid fa-magnifying-glass text-xl mr-6 hover:text-black transition-text duration-500 hover:scale-125"></i>
                     </button>
                  </span>
               </div>
            </form>
            @foreach($todolists as $todolist)
            @unless($todolist->completed)
            <li class="flex flex-row items-center justify-between p-2
                  @php
            $overdueClass = ($todolist->deadline && $todolist->deadline < now()) ? 'text-gray-500' : 'text-gray-500';
            echo $overdueClass;
            @endphp
                  font-bold bg-gradient-to-r from-blue-200 via-purple-150 to-blue-100 mx-4 mb-2 rounded-md">
            <span class="mr-auto text-xs">{{ $todolist->content }}</span>
            <span class="text-pink-800 font-extrabold shadow-sm text-xs">
               @php
               $deadlineDisplay = ($todolist->deadline && $todolist->deadline < now()) ? ' Task is Overdue' : ($todolist->deadline ? \Carbon\Carbon::parse($todolist->deadline)->format('d-m-Y') : 'No Deadline');
               echo $deadlineDisplay;
               @endphp
            </span>
            <form action="{{ route('complete', $todolist->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to mark the task as complete?')">
               @csrf
               <button type="submit" class="h-full">
                  <p class="text-white ml-7 mr-2 font-bold transition-text duration-500 ease-out" title="Mark task as complete">
                     <i class="fa-solid fa-check hover:scale-125 hover:text-black transition-text duration-500 p-1.5 text-green-700" title="Mark task as complete"></i>
                  </p>
               </button>
            </form>
            <!-- Edit Form -->
            <form action="{{ route('edit', $todolist->id) }}" method="GET">
               <button type="submit" class="text-white p-1">
                  <i class="fa-solid fa-pencil hover:text-black transition-text duration-500 hover:scale-125 text-blue-600" title="View or edit task"></i>
               </button>
            </form>
            <!-- Delete Form -->
            <form action="{{ route('destroy', $todolist->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
               @csrf
               @method('delete')
               <button type="submit" class="text-white p-1">
                  <i class="fa-solid fa-trash hover:text-black transition-text duration-500 hover:scale-125 text-red-600" title="Delete Task"></i>
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
      @if (session('success'))
      <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md mb-4 w-1/2 m-auto">
         {{ session('success') }}
      </div>
      @endif
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