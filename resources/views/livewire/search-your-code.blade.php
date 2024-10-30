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
            {{ $CodeDetails->links('./vendor/livewire/bootstrap') }}
            <!-- <div class="row">
                <div class="col-sm-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example2_previous">
                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                            </li>
                                
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                            </li>
                            <li class="paginate_button page-item next" id="example2_next">
                                <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
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

</div>