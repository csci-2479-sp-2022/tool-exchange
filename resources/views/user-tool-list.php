<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
        <ol>
            <strong><h1 style="text-decoration: underline;">List of My Tools:</h1></strong>

            // displays list of tools calling the tostring() in tool.php
            @foreach($usertools as $usertool)
                 <li>{{$usertool->toString()}}</li>
            @endforeach
        </ol>
    </section>

</body>

</html>
