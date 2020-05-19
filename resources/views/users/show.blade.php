<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>Username: {{ $user->username }}</div>
    <div>ID: {{ $user->id }}</div>
    <div>Name: {{ $user->name }}</div>
    <div>
        <form action="/users/{{ $user->id }}/edit" method="get">
            <button type="submit" value="Submit">Edit</button>
        </form>
        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" value="Submit">Delete</button>
        </form>
    </div>
</body>
</html>