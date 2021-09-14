@extends('admin.layout.main')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Blog Posts</span>
                <h3 class="page-title">Add New Post</h3>
            </div>
        </div>
        <!-- End Page Header -->
        {!! Form::open(['url' => '/admin/post/create', 'method'=> 'post']) !!}
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                    <div class="card-body">
                        {!! Form::text('title', '', ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Your Post Title']) !!}
                        {!! Form::text('slug', '', ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Your Post Slug']) !!}
                        {!! Form::text('subtitle', '', ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Your Post Subtitle']) !!}
                        <hr>
                        {!! Form::textarea('content_html',null , ['id' => 'mytextarea']) !!}
                        <br>
                        <div class="container">
                            <div class="accordion indicator-plus-before round-indicator" id="accordionH"
                                 aria-multiselectable="true">
                                <div class="card m-b-0">
                                    <div class="card-header collapsed" role="tab" id="headingOneH"
                                         href="#collapseOneH" data-toggle="collapse"
                                         data-parent="#accordionH" aria-expanded="false"
                                         aria-controls="collapseOneH">
                                        <a class="card-title">SEO</a>
                                    </div>
                                    <div class="collapse" id="collapseOneH" role="tabpanel"
                                         aria-labelledby="headingOneH">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Title:</label>
                                                    {!! Form::text('seo_title', '', ['class' => 'form-control', 'placeholder' => 'Post Title']) !!}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Keyphrase:</label>
                                                    {!! Form::text('keyphrase', '', ['class' => 'form-control', 'placeholder' => 'Post keyphrase']) !!}
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <label for="exampleFormControlTextarea1">Meta
                                                    Description</label>
                                                {!! Form::textarea('meta_description',null , ['class' => 'form-control']) !!}
                                            </div>
                                            <hr>
                                            <div class="row col-sm-12" dir="ltr">
                                                <h5>Check List</h5>
                                            </div>
                                            <div style="margin-left: 10px;">
                                                <p>Keyphrase Density <span
                                                        class="keyphrase-density color-red">30</span></p>
                                                <p>SEO Title <span
                                                        class="seo-title-length color-red">30</span></p>
                                                <p>Meta Description Length<span
                                                        class="meta-description-length color-red">30</span>
                                                </p>
                                                <p>Text Length <span class="text-length color-red">30</span>
                                                </p>
                                                <p><i class="fas fa-check"></i> Internal Links</p>
                                                <p><i class="fas fa-check"></i>Keyphrase in title</p>
                                                <p><i class="fas fa-check"></i>Outbound Links</p>
                                                <p><i class="fas fa-check"></i>Keyphrase in intro</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <!-- / Add New Post Form -->
            </div>
            <div class="col-lg-3 col-md-12">
                <!-- Post Overview -->
                <div class='card card-small mb-3'>
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Actions</h6>
                    </div>
                    <div class='card-body p-0'>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-3">
                                <div class="form-group">
                                    <!-- todo it will be accept tags -->
                                    <i class="material-icons mr-1">flag</i>
                                    <strong class="mr-1">Status:</strong>
                                    {!! Form::select('status_id', $statuses , null, ['class' => 'form-control', 'id' => 'status']); !!}

                                </div>
                                <span class="mb-2">
                                  <i class="material-icons mr-1">calendar_today</i>
                                  <strong class="mr-1">Schedule:</strong>
                                  <div class="input-group date" id="datetimepicker9" data-target-input="nearest">
                                        {!! Form::text('published_at', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker9']) !!}
                                        <div class="input-group-append" data-target="#datetimepicker9"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                  </div>
                            </span>
                                <div class="form-group">
                                    <!-- todo it will be accept tags -->
                                    <label>Category:</label>
                                    {!! Form::select('category_id', $categories , null, ['class' => 'form-control', 'id' => 'category']); !!}

                                </div>
                                <div class="form-group">
                                    <!-- todo it will be accept tags -->
                                    <label>Tags:</label>
                                    {!! Form::select('tags[]', $tags , null, ['class' => 'form-control', 'id' => 'tags', 'multiple' => true]); !!}

                                </div>
                            </li>
                            <li class="list-group-item d-flex px-3">
                                {!! Form::button('<i class="material-icons">file_copy</i> Save', ['type' => 'submit', 'class'=> 'btn btn-sm btn-accent ml-auto']); !!}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class='card card-small mb-3'>
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Post Image</h6>
                    </div>
                    <div class='card-body p-1'>
                        <div class="form-group col-md-12">
                            <label>Image:</label>
                            {!! Form::file('image'); !!}
                        </div>
                    </div>
                </div>
                <div class='card card-small mb-3'>
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Internal links</h6>
                    </div>
                    <div class='card-body p-1'>
                        <div class="form-group col-md-12">
                            <!-- todo it will be accept tags -->
                            <label>Keywords:</label>
                            {!! Form::select('internal_links[]', [] , null, ['class' => 'form-control', 'id' => 'keywords', 'multiple' => true]); !!}
                        </div>
                    </div>
                </div>

                <div class='card card-small mb-3'>
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Related Keyword Group</h6>
                    </div>
                    <div class='card-body p-1'>
                        <div class="form-group col-md-12">
                            <!-- todo it will be accept tags -->
                            <label>Group:</label>
                            {!! Form::select('keyword_group_id', $keywordsGroups , null, ['class' => 'form-control', 'id' => 'keyword-group']); !!}
                        </div>
                    </div>
                </div>
                <div class='card card-small mb-3'>
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Table of content</h6>
                    </div>
                    <div class='card-body p-1'>
                        <div class="form-group col-md-12">
                            <div class="custom-control custom-checkbox mb-1">
                                <input type="hidden" name="is_active_table_content" value="0">
                                {{Form::checkbox('is_active_table_content', 1, false, ['class' => 'custom-control-input', 'id' => 'formsCheckboxDefault' ])}}
                                <label class="custom-control-label" for="formsCheckboxDefault">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('style')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css"/>
    <style>
        /* accordion styles */
        .accordion .card-header {
            cursor: pointer;
            border: 1px solid #ccc;
        }

        .accordion .card-body {
            padding: 20px 20px
        }

        .accordion.heading-right .card-title {
            position: absolute;
            right: 50px;
        }

        .accordion.indicator-plus .card-header:after {
            float: right;
        }

        .accordion.indicator-plus .card-header.collapsed:after {
            content: "";
        }

        .accordion.indicator-plus-before.round-indicator .card-header:before {
            font-size: 14pt;
            margin-right: 10px;
        }

        .accordion.indicator-plus-before.round-indicator .card-header.collapsed:before {
            color: #000;
        }

        .accordion.indicator-plus-before .card-header:before {
            float: left;
        }

        .accordion.indicator-chevron .card-header:after {
            font-family: "FontAwesome";
            content: "";
            float: right;
        }

        .accordion.indicator-chevron .card-header.collapsed:after {
            content: "";
        }

        .accordion.background-none [class^=card] {
            background: transparent;
        }

        .accordion.border-0 .card {
            border: 0;
        }
    </style>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker9').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                "defaultDate": new Date()
            });
            $('#tags').select2({
                placeholder: "select Tag",
                allowClear: true,
                tags: true
            });
            $('#keywords').select2({
                placeholder: "Add Internal Keyword",
                allowClear: true,
                tags: true
            });
            $('#status, #category, #keyword-group').select2({
                placeholder: "please select Value",
                allowClear: true,
            });
        });

    </script>
@endsection
