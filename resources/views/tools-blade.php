<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <p>
        <a href="{{route('tool-form')}}">Create new tool list</a>
    </p>
    <table style=" margin: 15% auto 0 auto; padding: 10px;   border: 2px solid black;">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Category</th>
            <th>Condition</th>
        </tr>
        @foreach($tools as $tool)
        <tr>
            <td>{{$tool->name}}</td>
            <td>{{$tool->type}}</td>
            <td>{{$tool->category}}</td>
            <td>{{$tool->condition}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
