@extends('admin.layout.main')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Keywords Groups</span>
                <h3 class="page-title">@if($keywordGroupObject->getId()) Edit @else Create @endif  Keywords Groups</h3>

            </div>
        </div>
        <!-- End Page Header -->
        {{--    Page Content    --}}
        <div class="card card-small mb-3">
            <div class="card-body">
                    @if($keywordGroupObject->getId())
                        {!! Form::open(['url' => '/admin/keyword-group/'. $keywordGroupObject->getId(), 'method'=> 'put']) !!}
                    @else
                        {!! Form::open(['url' => '/admin/keyword-group/create', 'method'=> 'post']) !!}
                    @endif
                            @csrf
                    <div class="row p-3">
                        <div class="col-sm-6">
                            <input name="main_keyword" class="form-control" type="text" placeholder="Main Keyword" value="{{$keywordGroupObject->getMainKeyword()}}">
                        </div>
                        <div class="col-sm-6">
                            <select id="assigned_to" name="assigned_to" class="form-control">
                                <option selected value="">Choose Author</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" @if($keywordGroupObject->getAssignedTo()) selected @endif>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-3">
                        <table class="table keyword-group">
                            <tr>
                                <th>keyword</th>
                                <th>Search Volume</th>
                                <th>All in title</th>
                                <th>KGR</th>
                                <th>Keyword Difficulty</th>
                                <th>Action</th>
                            </tr>
                            @if($keywordGroupObject->getId() == null)
                                <tr>
                                    <td><input name="keywords[0][keyword]" index="0" type="text" class="form-control"></td>
                                    <td><input name="keywords[0][search_volume]" index="0" class="search_volume-0 form-control"
                                               type="text">
                                    </td>
                                    <td><input name="keywords[0][all_in_title]" index="0" class="all_in_title-0 form-control"
                                               type="text">
                                    </td>
                                    <td><input name="keywords[0][kgr]" index="0" class="kgr-0 form-control" type="text" readonly></td>
                                    <td><input name="keywords[0][keyword_difficulty]" index="0" class="keyword_difficulty-0 form-control" type="text"></td>
                                    <td><a class="btn btn-primary add-new" href="javascript:;"><i
                                                class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                            @endif
                            @foreach($keywordGroupObject->getKeywords() as $key => $keyword)
                                <tr>
                                    <td><input name="keywords[{{$key}}][keyword]" index="{{$key}}" value="{{$keyword['keyword']}}" type="text" class="form-control"></td>
                                    <td><input name="keywords[{{$key}}][search_volume]" index="{{$key}}" value="{{$keyword['search_volume']}}" class="search_volume-{{$key}} form-control"
                                               type="text">
                                    </td>
                                    <td><input name="keywords[{{$key}}][all_in_title]" index="{{$key}}"  value="{{$keyword['all_in_title']}}" class="all_in_title-{{$key}} form-control"
                                               type="text">
                                    </td>
                                    <td><input name="keywords[{{$key}}][kgr]" index="{{$key}}"  value="{{$keyword['kgr']}}" class="kgr-{{$key}} form-control" type="text" readonly></td>
                                    <td><input name="keywords[{{$key}}][keyword_difficulty]" index="{{$key}}"  value="{{$keyword['keyword_difficulty']}}" class="keyword_difficulty-{{$key}} form-control" type="text"></td>
                                    <td><a class="btn btn-primary add-new" href="javascript:;"><i
                                                class="fas fa-plus"></i></a>
                                        @if($key > 0)
                                            <a class="btn btn-danger remove-line" href="javascript:;"><i class="fas fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <hr>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <textarea name="notes" id="notes" class="form-control" cols="30" rows="10" placeholder="Notes">{{$keywordGroupObject->getNotes()}}</textarea>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-sm btn-success ml-auto">
                        <i class="material-icons">save</i> Save
                    </button>
                {!! Form::close() !!}
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
        let index = "{{count($keywordGroupObject->getKeywords()) > 0 ? count($keywordGroupObject->getKeywords()) : count($keywordGroupObject->getKeywords())+1}}";
        function addNewLine(lineNumber) {
            $('.keyword-group').append(`<tr>
                                    <td><input name="keywords[${lineNumber}][keyword]" index="${lineNumber}" type="text" class="form-control"></td>
                                    <td><input name="keywords[${lineNumber}][search_volume]" index="${lineNumber}" class="search_volume-${lineNumber} form-control" type="text"></td>
                                    <td><input name="keywords[${lineNumber}][all_in_title]" index="${lineNumber}" class="all_in_title-${lineNumber} form-control" type="text"></td>
                                    <td><input name="keywords[${lineNumber}][kgr]" index="${lineNumber}" class="kgr-${lineNumber} form-control" type="text" readonly></td>
                                    <td><input name="keywords[${lineNumber}][keyword_difficulty]" index="${lineNumber}" class="keyword_difficulty-${lineNumber} form-control" type="text"></td>
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
        $(document).on('change', "input[class^='search_volume-'], input[class^='all_in_title-']", function (event) {
            let index = $(this).attr('index');
            let searchVolume = $(`.search_volume-${index}`).val();
            let allInTitle = $(`.all_in_title-${index}`).val();
            let kgr = (searchVolume > 0) ? allInTitle / searchVolume : 0;
            $(`.kgr-${index}`).val(kgr.toFixed(2));
        })
    </script>
@endsection
