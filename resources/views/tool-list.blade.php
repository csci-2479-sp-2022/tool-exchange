<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tools') }}
        </h1>
    </x-slot>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week 3</title>
</head>
<div class="topnav">
<a href='/search-results'>
  <input type="text" placeholder="Search..">
  <button>Search</button>
</a>
</div>
<body>
<h1>Tool List</h1>
    <ul><h2>My Tools:</h2>
    <p>
        <a href="{{route('tool-form')}}">Create new Tool List</a>
    </p>
    @foreach($tools as $tool)
        <li>{{$tool->name}} , <a href="/tools/{{$tool->id}}">view</a> </li>
    @endforeach
</body>
</html>
