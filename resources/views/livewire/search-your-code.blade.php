@section('title', 'Search Your Code')

<div class="content-wrapper mt-2">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title mb-2 ml-2">Search Your Code</h3>
                            <input type="text" class="form-control mt-2" placeholder="Search Your Code Here......" wire:model="search_code" wire:input="searchCodeField">
                        </div>
                        @if (session()->has('success'))
                            <div class="alert mt-3 mb-0" style="color: green;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <table class="table table-bordered table-hover" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th>Technology Name</th>
                                        <th>Name of code</th>
                                        <th>Description</th>
                                        <th>View Code</th>
                                    </tr>
                                </thead>
                                    @foreach($CodeDetails as $code)
                                        <tr>
                                            <td>{{$code->technology->tech_name}}</td>
                                            <td>{{$code->code_name}}</td>
                                            <td>{{$code->code_desc}}</td>
                                            <td>
                                                <button class="btn btn-primary" wire:click="detailCode({{ $code->id }})">View Code</button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    @if($isOpen)
        <div class="modal fade show" style="display: block;" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Code Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <pre><code>{!! e($clickedCodeDetails ? $clickedCodeDetails->code_detail : 'Code details not entered...') !!}</code></pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal">Close</button>
                        <!-- <button class="btn btn-primary" wire:click="viewMoreCodeDetails({{ $clickedCodeDetails->id }})">View More</button> -->
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Code Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->

</div>