@section('title', 'Manage Your Code')

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
                        <div class="card-body">
                            <table id="" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Technology Name</th>
                                        <th>Name of code</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Edit Data</th>
                                        <th>Delete Data</th>
                                    </tr>
                                </thead>
                                @foreach($CodeDetails as $code)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$code->technology->tech_name}}</td>
                                        <td>{{$code->code_name}}</td>
                                        <td>{{$code->code_desc}}</td>
                                        <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="statusChange{{$code->id}}"
                                            wire:change="updateCodeStatus({{$code->id}}, {{$code->status}})"
                                            {{$code->status == 1 ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="statusChange{{$code->id}}"></label>
                                        </div>
                                        </td>
                                        <td><button wire:click="edit({{$code->id}})" class="btn btn-primary">Edit</button></td>
                                        <td><button wire:confirm="Are you sure to delete this code?"  wire:click="delete({{$code->id}})" class="btn btn-primary">Delete</button></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>