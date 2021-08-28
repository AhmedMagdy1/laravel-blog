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
        <div class="card card-small mb-3">
            <div class="card-body">
                <form action="/admin/keyword-group/create" method="post">
                    @csrf
                    <div class="row p-3">
                        <div class="col-sm-6">
                            <input name="main_keyword" class="form-control" type="text" placeholder="Main Keyword">
                        </div>
                        <div class="col-sm-6">
                            <select id="assigned_to" name="assigned_to" class="form-control">
                                <option selected value="">Choose Author</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                                <td><input name="keywords[0][keyword]" type="text" class="form-control"></td>
                                <td><input name="keywords[0][search_volume]" class="search_volume-0 form-control"
                                           type="text">
                                </td>
                                <td><input name="keywords[0][kgr]" class="kgr-0 form-control" type="text"></td>
                                <td><input name="keywords[0][all_in_title]" class="all_in_title-0 form-control"
                                           type="text">
                                </td>
                                <td><a class="btn btn-primary add-new" href="javascript:;"><i
                                            class="fas fa-plus"></i></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button class="btn btn-sm btn-success ml-auto">
                        <i class="material-icons">save</i> Save
                    </button>
                </form>
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
                                    <td><input name="keywords[${lineNumber}][keyword]" type="text" class="form-control"></td>
                                    <td><input name="keywords[${lineNumber}][search_volume]" class="search_volume-${lineNumber} form-control" type="text"></td>
                                    <td><input name="keywords[${lineNumber}][kgr]" class="kgr-${lineNumber} form-control" type="text"></td>
                                    <td><input name="keywords[${lineNumber}][all_in_title]" class="all_in_title-${lineNumber} form-control" type="text"></td>
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
