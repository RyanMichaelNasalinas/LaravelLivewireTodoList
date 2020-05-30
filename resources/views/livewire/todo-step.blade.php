<div>
    <div class="d-flex justify-content-between align-items-center">
        <label class="font-weight-bold">Add Steps For Task</label>
        <button wire:click="increment" onclick="event.preventDefault()" class="btn btn-dark">
            <h4>
                <span class="fas fa-plus align-middle" style="cursor:pointer"></span>
            </h4>
        </button>

    </div>
    <div class="card-body">
        @foreach($steps as $step)
        <div class="d-flex justify-content-between align-items-center" wire:key={{ $step }}>
            <input type="text" name="step[]" class="form-control m-1" placeholder="{{ 'Step '. ($step+1) }}">
            <button wire:click="decrement({{ $step }})" type="button" class="btn btn-danger btn-sm">
                <span class="fas fa-minus align-middle" style="cursor:pointer"></span>
            </button>
        </div>
        @endforeach
    </div>
</div>