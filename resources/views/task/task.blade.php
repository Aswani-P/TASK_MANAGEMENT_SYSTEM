<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <x-auth-session-status class="mb-4" :status="session('message')" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="btn btn-success" href="{{route('create')}}" role="button">Add new Task</a>
                </div>

                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Task Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                             </tr>
                        </thead>
                        
                        @foreach($tasks as $task)
                        <tbody>
                            <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{$task->task}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{$task->status}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('edit',($task->id))}}" role="button">EDIT</a>
                                        <a class="btn btn-danger" href="{{route('delete',($task->id))}}" role="button">DELETE</a>
                                    </td>

                            </tr>
                            
                        </tbody>
                         @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>
