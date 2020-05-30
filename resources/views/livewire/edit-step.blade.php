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
        @forelse($steps as $step)
        <div class="d-flex justify-content-between align-items-center" wire:key={{ $loop->index }}>
            <input type="text" name="stepName[]" class="form-control m-1" placeholder="{{ 'Step '. ($loop->index+1) }}"
                value="{{ $step['name'] }}">
            <input type="hidden" name="stepId[]" value="{{ $step['id'] }}">
            <button wire:click="decrement({{ ($loop->index) }})" type="button" class="btn btn-danger btn-sm">
                <span class="fas fa-minus align-middle" style="cursor:pointer"></span>
            </button>
        </div>
        @empty
        <div class="text-center">
            <p>No Steps Available, you can add new steps</p>
        </div>
        @endforelse
    </div>
</div>