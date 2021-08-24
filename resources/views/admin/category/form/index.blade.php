@extends('admin.layout.main')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Category</span>
                <h3 class="page-title">@isset($category) Edit @else Create @endisset  New Category</h3>
            </div>
        </div>
        <!-- End Page Header -->
        {{--    Page Content    --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-small mb-3">
                    <div class="card-body">
                        {{dd($category)}}
                    </div>
                </div>
            </div>
        </div>
        {{--    Page Content    --}}
    </div>
@endsection
@section('style')
    <style>

    </style>
@endsection
