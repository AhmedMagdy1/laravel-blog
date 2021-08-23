@extends('admin.layout.main')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Keywords Groups</span>
                <h3 class="page-title">Create New Keywords Groups</h3>
            </div>
        </div>
        <!-- End Page Header -->
        {{--    Page Content    --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-small mb-3">
                    <div class="card-body">
                        <div class="row p-3">
                            <table class="table keyword-group">
                                <tr>
                                    <th>keyword</th>
                                    <th>Search Volume</th>
                                    <th>KGR</th>
                                    <th>Allintitle</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><input name="group[keyword][0]" type="text" class="form-control"></td>
                                    <td><input name="group[search_volume][0]" class="search_volume-0 form-control" type="text"></td>
                                    <td><input name="group[kgr][0]" class="kgr-0 form-control" type="text"></td>
                                    <td><input name="group[all_in_title][0]" class="all_in_title-0 form-control" type="text"></td>
                                    <td><a class="btn btn-primary add-new" href="javascript:;"><i class="fas fa-plus"></i></a></td>
                                </tr>
                            </table>
                            <button class="btn btn-sm btn-success ml-auto">
                                <i class="material-icons">save</i> Save
                            </button>

                        </div>
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
        let index = 1;
        function addNewLine(lineNumber) {
            $('.keyword-group').append(`<tr>
                                    <td><input name="group[keyword][${lineNumber}]" type="text" class="form-control"></td>
                                    <td><input name="group[search_volume][${lineNumber}]" class="search_volume-${lineNumber} form-control" type="text"></td>
                                    <td><input name="group[kgr][${lineNumber}]" class="kgr-${lineNumber} form-control" type="text"></td>
                                    <td><input name="group[all_in_title][${lineNumber}]" class="all_in_title-${lineNumber} form-control" type="text"></td>
                                    <td>
                                          <a class="btn btn-primary add-new" href="javascript:;"><i class="fas fa-plus"></i></a>
                                          <a class="btn btn-danger remove-line" href="javascript:;"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>`);
            index++;
        }
        $(document).on('click', '.add-new', function (event) {
            event.preventDefault();
            addNewLine(index);
        });
        $(document).on('click', '.remove-line', function (event) {
            event.preventDefault();
            $(this).parents('tr').remove();
        });
    </script>
@endsection
