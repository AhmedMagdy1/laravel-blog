@extends('admin.layout.main')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Category</span>
                <h3 class="page-title">@if($category->getId()) Edit @else Create @endif Category</h3>
            </div>
        </div>
        <!-- End Page Header -->
        {{--    Page Content    --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-small mb-3">
                    <div class="card-body">
                        @if($category->getId())
                            {!! Form::open(['url' => '/admin/category/'. $category->getId(), 'method'=> 'put']) !!}
                        @else
                            {!! Form::open(['url' => '/admin/category/create', 'method'=> 'post']) !!}
                        @endif
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    {!! Form::label('name', 'Name', ['class' => 'control-label']); !!}
                                    {!! Form::text('name', $category->getName(), ['class' => 'form-control']) !!}
                                    @if ($errors->has('name'))
                                        <div class="col-12">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    {!! Form::label('slug', 'Slug', ['class' => 'control-label']); !!}
                                    {!! Form::text('slug', $category->getSlug(), ['class' => 'form-control']) !!}
                                    @if ($errors->has('name'))
                                        <div class="col-12">
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    {!! Form::label('parent_id', 'Parent Category', ['class' => 'control-label']); !!}
                                    {!! Form::select('parent_id', $categories , $category->getParentId(), ['class' => 'form-control']); !!}
                                </div>
                            </div>
                            <hr>
                            {!! Form::submit('Save', ['class'=> 'btn btn-success']); !!}

                        {!! Form::close() !!}
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
@section('script')
    <script>
        $('#parent_id').select2({
            placeholder: 'Select parent Category',
            allowClear: true
        });
    </script>
@endsection
