<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ce7f964f6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Todo List</title>
</head>
<body>
    <div class="container w-25 mt-5">
        <div class="card">
            <div class="card-body">
                <h3>To-Do List</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf 
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your Task"/>
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </form>

                <!-- If Task list code starts --> 
                @if(count($todolists))
                    <ul class="list-group list-group-flush">
                        @foreach($todolists as $todolist)
                            <li class="list-group-item">
                                <form action="{{ route('destroy', $todolist -> id) }}" method="POST">
                                    {{ $todolist -> content }}
                                    @csrf 
                                    @method('delete')
                                    <button type="submit" class="btn btn-link">
                                    <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-center">No Tasks!</p>
                @endif
                <!-- If Task list code Ends --> 
            </div>
            @if(count($todolists)) 
                <div class="card-footer">
                    <h2> You have {{ count($todolists) }} pending tasks </h2>
                </div>
                @else
                <!-- Display nothing -->
            @endif
        </div>
    </div>
</body>
</html>