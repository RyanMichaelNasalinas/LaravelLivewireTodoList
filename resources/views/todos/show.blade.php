@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2 class="text-center">{{ $todo->title }}</h2>
                    <a href="{{route("todo.index")}}" class="text-dark d-flex justify-content-end">
                        <i class="fas fa-arrow-alt-circle-left fa-3x"></i>
                    </a>
                </div>
                <div class="card-body text-center">
                    <h4>Todo Description</h4>
                    <p>{{ $todo->description }}</p>
                </div>
                @if($todo->steps->count() > 0)
                <div class="card-footer text-center">
                    <h4>Todo Step(s)</h4>
                    <ul class="list-group">
                        @foreach($todo->steps as $step)
                        <li class="list-group-item">
                            {{ $step->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection