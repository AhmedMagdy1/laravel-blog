@extends('admin.layout.main')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Categories</span>
                <h3 class="page-title">List Category </h3>
            </div>
            <div class="col-sm-8">

            </div>
        </div>
        <!-- End Page Header -->
        {{--    Page Content    --}}
        <div class="row">
            <div class="col">
                <div class="card card-small mb-4">
                    <div class="p-3" style="text-align: right;">
                        <a href="/admin/category/create" class="btn btn-success"> <i class="fas fa-plus"></i>  Add Category</a>
                    </div>

                    <div class="card-body p-0 pb-3 text-center">
                        <table class="table mb-0">
                            <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Name</th>
                                <th scope="col" class="border-0">Slug</th>
                                <th scope="col" class="border-0">Slug</th>
                                <th scope="col" class="border-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{($category->parentCategory->count()) ? $category->parentCategory[0]['name'] : ''}}</td>
                                    <td><a href="/admin/category/{{$category->id}}/edit"><i class="fas fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            {{$categories->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Page Content--}}
    </div>
@endsection
@section('style')
    <style>

    </style>
@endsection
