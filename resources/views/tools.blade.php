<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tools</title>

</head>

<body>
    <p>
        <a href="{{route('toolform')}}">Create new Tool List</a>
    </p>
    <table style=" margin: 15% auto 0 auto; padding: 10px;   border: 2px solid black;">
        <tr>
            <th>Tool Name</th>
            <th>Tool Category</th>
            <th>Tool Type</th>
            <th>Tool List for Rent</th>
        </tr>
        @foreach($tools as $tool)
        <tr>
            <td>{{$tool->tool list}}</td>
            <td>{{$tool->tool-name}}</td>
            <td>{{$tool->tool-category}}</td>
            <td>{{$tool->tool_type}}</td>
            <td>{{$tool->rent_yes_no}}</td>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>
