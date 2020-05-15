<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create user</h1>
    <form action="/users" method="POST">
        @csrf
        <div><label>Name</label></div>
        <div><input type="text" id="name" name="name" value="{{ old('name') }}" required></div>
        @error('name')
            <p>{{ $errors->first('name') }}</p>
        @enderror
        <div><label>Username</label></div>
        <div><input type="text" id="username" name="username" value="{{ old('name') }}" required></div>
        @error('username')
            <p>{{ $errors->first('username') }}</p>
        @enderror
        <div><label>Password</label></div>
        <div><input type="password" id="password" name="password" required></div>
        @error('password')
            <p>{{ $errors->first('password') }}</p>
        @enderror
        <div><button type="submit" value="Submit">Submit</button></div>
    </form>
</body>
</html>