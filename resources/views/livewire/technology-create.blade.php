<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Technology</h3>
    </div>
    @if (session()->has('success'))
        <div class="alert mt-3 mb-0" style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="tech_submit">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="tech_name">Technology Name</label>
                <input type="text" class="form-control" id="tech_name" placeholder="Enter Name of Technology" wire:model.debounce.100ms="tech_name">
                @error('tech_name')
                    <span id="tech_name-error" class="error" style="color:red;">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mt-4 mb-0 ml-1">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="status" wire:model.debounce.100ms="status" {{$this->status == true ? 'checked' : ''}} >
                    <label class="custom-control-label" for="status">Status</label>
                </div>
            </div>

            <input type="hidden" wire:model.debouce.100ms="techEditId">
        </div>

        <div class="card-footer mb-2">
            <button type="submit" class="btn btn-primary">{{ $techEditId ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>
                
  