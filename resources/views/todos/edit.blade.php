@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route("todo.index")}}" class="text-dark d-flex justify-content-end">
                <i class="fas fa-arrow-alt-circle-left fa-3x"></i>
            </a>
            <h1 class="text-center">Update TO-DO</h1>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('todo.update',[$todo->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Todo Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{$todo->title}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Descrition</label>
                            <textarea name="description"
                                class="form-control @error('description') is-invalid @enderror">{{ $todo->description }}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="card border-dark">
                                <div class="card-header border-dark bg-dark text-white">
                                    @livewire('edit-step',['steps' => $todo->steps])
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Todo" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection