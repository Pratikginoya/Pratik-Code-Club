@section('title', 'Store Your Code')

<div class="content-wrapper mt-2">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Store Your New Code</h3>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert mt-3 mb-0" style="color: green;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="code_submit">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="tech_id">Technology Name</label>
                                        <select class="form-control" wire:model.debounce.100ms="tech_id">
                                            <option value="{{ $this->tech_id }}">-Select Technology Name-</option>
                                            @foreach ($techName as $tech)
                                                <option value="{{ $tech->id }}" @if ($this->tech_id == $tech->id) selected
                                                @endif>{{ $tech->tech_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('tech_id')
                                            <span id="tech_id-error" class="error" style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="code_name">Name of code</label>
                                        <input type="text" class="form-control" id="code_name"
                                            placeholder="Enter Name of Technology"
                                            wire:model.debounce.100ms="code_name">
                                        @error('code_name')
                                            <span id="code_name-error" class="error" style="color:red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="code_desc">Short description of code</label>
                                    <input type="text" class="form-control" id="code_desc"
                                        placeholder="Enter Name of Technology" wire:model.debounce.100ms="code_desc">
                                    @error('code_desc')
                                        <span id="code_desc-error" class="error" style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 textarea-text-view">
                                    <label for="code_detail">Your Code/Details</label>
                                    <textarea class="form-control" rows="8" 
                                        wire:model.debounce.100ms="code_detail"></textarea>
                                    @error('code_detail')
                                        <span id="code_detail-error" class="error" style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="code_keyword">Keyword of code (for easy search)</label>

                                    <div class="mb-2">
                                        @foreach($final_keywords as $keyword)
                                            <div class="tag gray">
                                                <span class="keyword">{{$keyword}}</span>
                                                <span class="close-icon"
                                                    wire:click="remove_this_keyword('{{$keyword}}')">&times;</span>
                                            </div>
                                        @endforeach
                                    </div>

                                    <input type="text" class="form-control" id="code_keyword"
                                        placeholder="Enter Name of Technology" wire:model.debounce.100ms="code_keyword"
                                        wire:change="add_keyword">
                                    @error('code_keyword')
                                        <span id="code_keyword-error" class="error" style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4 mb-0 ml-1">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="status"
                                        wire:model.debounce.100ms="status">
                                        <label class="custom-control-label" for="status">Status</label>
                                    </div>
                                </div>
                                <input type="hidden" wire:model="edit_code_details_id">
                                
                            </div>

                            <div class="card-footer mb-2">
                                <button type="submit" class="btn btn-primary">{{ $edit_code_details_id ? 'Update' : 'Submit' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>