<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Task Dashboard</h1>
    <a href="{{ route('tasks.create') }}">Add New Task</a>
    <ul>
            @foreach ($tasks as $task)
                <li>
                    {{ $task->title }} - {{ $task->status }}
                    <form method="POST" action="{{ route('tasks.updatestatus', $task->id) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit">
                            {{ $task->status === 'completed' ? 'Mark as Pending' : 'Mark as Completed' }}
                        </button>
                    </form><a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
    </ul>
</body>

</html>
