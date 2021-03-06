<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <h1>Welcome {{Auth::user()->name}} to tool exchange!!</h1>
                    <h2>Email: {{Auth::user()->email}}</h2>
                    <p>
        <a href="{{route('tool-form')}}">List Tools For Rental</a>
    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
