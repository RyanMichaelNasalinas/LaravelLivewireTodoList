@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-alert></x-alert>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2 align-items-center">
                        <h5 class="card-title font-weight-bold">All Todos</h5>
                        <a href="{{route('todo.create')}}" class="btn btn-primary">
                            <i class="fas fa-plus-square"></i>
                        </a>
                    </div>
                    <ul class="list-group">
                        @forelse($todos as $todo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                @include('todos.completed-btn')
                            </div>
                            @if($todo->completed)
                            <p>
                                <del>
                                    <b>{{$todo->title}}</b>
                                </del>
                            </p>
                            @else
                            <p>{{$todo->title}}</p>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('todo.show', [$todo->id])}}" class="text-success mr-3">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('todo.edit', [$todo->id])}}" class="text-primary mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form method="post" action="{{ route('todo.delete',$todo->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn" onclick="return confirm('Are you sure you want to delete?')">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>

                            </div>
                        </li>
                        @empty
                        <li class="list-group-item d-flex justify-content-center align-items-center bg-dark text-white">
                            <h2 class="font-weight-bold">No Todos Available</h2>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection