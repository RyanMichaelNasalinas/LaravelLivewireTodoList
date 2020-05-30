@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route("todo.index")}}" class="text-dark d-flex justify-content-end">
                <i class="fas fa-arrow-alt-circle-left fa-3x"></i>
            </a>
            <h1 class="text-center">Create TO-DO</h1>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('todo.create')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Todo Name</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description"
                                class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="card border-dark">
                                <div class="card-header border-dark bg-dark text-white">
                                    @livewire('todo-step')
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex align-content-center">
                            <input type="submit" value="Create" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection