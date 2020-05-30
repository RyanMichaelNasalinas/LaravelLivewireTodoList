@if($todo->completed)
<form method="post" action="{{ route('todo.incomplete',$todo->id) }}">
    @csrf
    @method('delete')
    <button class="btn">
        <i class="fas fa-check-circle text-success" style="cursor:pointer"></i>
    </button>
</form>
@else
<form method="post" action="{{ route('todo.complete',$todo->id) }}">
    @csrf
    @method('put')
    <button class="btn">
        <i class="far fa-check-circle" style="cursor:pointer"></i>
    </button>
</form>
@endif