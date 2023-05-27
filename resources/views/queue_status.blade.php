<!DOCTYPE html>
<html>
<head>
    <title>Queue Status</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<h1>Queue Status</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Task Class</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    @foreach ($tasks as $task)
        <tr class="{{$task->status}}">
            <td>{{ $task->id }}</td>
            <td>{{ $task->class }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->created_at }}</td>
            <td>{{ $task->updated_at }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
