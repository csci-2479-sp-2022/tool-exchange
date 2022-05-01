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
        <a href="{{route('tool-list')}}">Back to tool list</a>
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
        <form action="/tool-list" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="tool name">Tool Name</label>
                <input type="text" name="tool name" id="tool name">
            </div>
            <div>
                <label for="category">Tool Category</label>
                <input type="dropdown" name="category" id="category">
            </div>
            <div>
                <label for="condition">Tool Condition</label>
                <input type="dropdown" name="condition" id="condition">
            </div>
            <div>
                <button type="save">Save Tools</button>
            </div>
        </form>
    </div>
</body>
</html>
