<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Tool List</title>
    <style>
        form > div {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Tool form</h1>
    <p>
        <a href="{{route('toollist')}}">Back to home</a>
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
                <label for="title">Tool List</label>
                <input type="text" name="list" id="list">
            </div>
            <div>
                <label for="tool-name">Tool Name</label>
                <input type="text" name="year" id="year">
            </div>
            <div>
                <label for="tool-category">Tool Category</label>
                <input type="text" name="category" id="category">
            </div>
            <div>
                <label for="tool-type">Tool Type</label>
                <input type="text" name="type" id="type">
            </div>
            <div>
                <label for="list-for-rent">
                    <input type="checkbox" name="list for rent" id="list for rent">
                    List For Rent
                </label>
            </div>
            <div>
                <button type="submit">Save Tools</button>
            </div>
        </form>
    </div>
</body>
</html>
