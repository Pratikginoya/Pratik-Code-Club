@section('title', 'Search Your Code')

<div class="content-wrapper mt-2">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <!-- <div class="card-header"> -->
                            <h3 class="card-title m-3 ml-2">
                                <a href="javascript:history.back()" class="btn btn-primary d-flex align-items-center" style="width: 100px;">
                                    <i class="fa-solid fa-arrow-left-long mr-3"></i> 
                                    <span>Back</span>
                                </a>
                            </h3>
                        <!-- </div> -->
                        <pre><code>{!! e($clickedCodeDetails ? $clickedCodeDetails->code_detail : 'Code details not entered...') !!}</code></pre>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>