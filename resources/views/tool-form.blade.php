<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form > div {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Tool form</h1>
    <p>
        <a href="{{route('tools')}}">Back to tool list</a>
    </p>
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/tool" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="tool name">Tool Name</label>
                <input type="text" name="tool name" id="tool_name">
            </div>
            <label for="category">Category</label>
                <select name="category" id="category">
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}},{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <label for="condition">Condition</label>
                <select name="condition" id="condition">
                    <option value=""></option>
                    @foreach($conditions as $condition)
                        <option value="{{$condition->id}}">{{$condition->name}}</option>
                    @endforeach
                </select>
            <div>
                <button type="save">Save Tools</button>
            </div>
        </form>
    </div>
</body>
</html>
