@extends('layouts.app')

@section('title', 'Technology')

@section('content')
<div class="content-wrapper mt-2">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @livewire('technology-create')
                </div>

                <div class="col-md-6">
                    @livewire('technology-view')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection