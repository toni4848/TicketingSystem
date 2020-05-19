<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <div><table style="width: 50%">
        <tr>
            <th style="text-align: left">User ID</th>
            <th style="text-align: left">Username</th>
            <th style="text-align: left">Name</th>
          </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->name }}</td>
            <td><form action="/users/{{ $user->id }}" method="get">
                <button type="submit" value="Submit">View</button>
            </form></td>
        </tr>
        @endforeach
    </table></div>
</body>
</html>