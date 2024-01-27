<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ce7f964f6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Todo List</title>
    <style>
        /* Additional styling for centering */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: rgb(203, 4, 145);
            background: linear-gradient(13deg, rgba(203, 4, 145, 0.6306897759103641) 25%, rgba(43, 159, 218, 0.7035189075630253) 69%);
        }

        /* Added custom styling for list items */
        .list-group-item {
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.7);
        }
        .list-group-item form {
            margin-left: auto;
            margin-right: 10px;
        }

        h1, h2 {
            color: #eceddd;
            opacity: 80%;
        }

        .padd-me {
            position: absolute;
        }
        .btn-primary:hover {
            color: white;
            background-color: #c142a0;
            opacity: 0.8;
        }
        p {
            transition: background-color 0.4s ease;
        }
        p:hover {
            color: #c142a0;
        }
        .btn-primary {
            width: 13em;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mb-3">To-Do List</h1>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="content" class="form-control" placeholder="Add your Task" />
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <!-- If Task list code starts -->
                @if(count($todolists))
    <ul class="list-group list-group-flush mt-3">
        @foreach($todolists as $todolist)
            @unless($todolist->completed)
            <li class="list-group-item mb-2">
                <span class="padd-me">{{ $todolist->content }}</span>
                <!-- Edit Form -->
                <form action="{{ route('edit', $todolist->id) }}" method="GET">
                    <button type="submit" class="btn btn-info">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </form>

                <!-- Delete Form -->
                <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-link">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                
                <form action="{{ route('complete', $todolist->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        <p>Mark as complete</p>
                    </button>
                </form>
            </li>
            @endunless
        @endforeach
    </ul>
@else
    <p class="text-center mt-3">No Tasks!</p>
@endif
                <!-- If Task list code Ends -->
            </div>
            @if(count($todolists))
            <div class="card-footer text-center mt-3">
                <h2> You have {{ $todolists->where('completed', false)->count() }} pending tasks </h2>
            </div>
            @else
            <!-- Display nothing -->
            @endif
        </div>
    </div>
</body>

</html>