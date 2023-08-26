<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add New Task</h1>
    <ul>
            <li>
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>
                    <br>

                    <label for="description">Description:</label>
                    <textarea name="description" id="description" rows="4" required></textarea>
                    <br>

                    <button type="submit">Add Task</button>
                </form>
            </li>
    </ul>
</body>
</html>
