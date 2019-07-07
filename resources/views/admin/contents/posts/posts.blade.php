@extends('layouts.admin')
@section('content')
    <script>
        @if(\Session::has('message'))
        var type = "{{ \Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ \Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ \Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ \Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ \Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <style>
        .pagination li {
            padding: 17px;
            font-size: 18px;
        }
        .pagination li {
            border: 1px solid #4272d7;
            border-radius: 50px;
            padding: 10px;
            width: 49px;
            text-align: center;
        }
        .pagination li:hover a{
            color: #FFFFFF;
        }
        .pagination li:hover{
            background-color: #4272d7;
        }
        .pagination li.active{
            background-color: #4272d7;
            color: #FFFFFF;
        }
    </style>
    <div class="main-content bg-white border-left" style="padding-bottom: 10em">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="mb-5">
                    @can('add')
                        <a href="{{ route('posts.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Content</button></a>
                    @endcan
                </div>
                <form action="{{ route('posts.index') }}">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" value="{{ $q }}" class="form-control" name="search" placeholder="@lang('pages.search_here')">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-info">@lang('pages.search')</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mb-5">
                    <table class="table-bordered table-hover w-100">
                        <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Img</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $lang = App::getLocale();
                            @endphp

                            @foreach($posts as $post)
                                @php
                                    $lang = App::getLocale();
                                    $language = App\Language::where('lang', $lang)->first();
                                         $category =  DB::table('categories')
                                            ->join('category_lang', 'categories.id','category_lang.category_id')
                                            ->select('categories.status', 'categories.order', 'categories.id', 'category_lang.name', 'category_lang.lang_id')
                                            ->where('category_lang.lang_id', $language->id)
                                            ->where('category_lang.category_id', $post->category_id)
                                            ->first();
                                @endphp
                                <tr style="text-align: center">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ str_limit($post->title, 30) }}</td>
                                    <td>{{ $category->name}}</td>
                                    <td>
                                        <img src="{{ asset('storage' .'/recentPostsThumbnail/'. $post->img) }}" alt="" style="width: 50px">
                                    </td>
                                    <td>{{ date('d.m.Y', strtotime($post->created_at)) }}</td>
                                    <td>
                                        @if($post->status == 0)
                                            <span class="badge badge-danger">deactive</span>
                                        @elseif($post->status == 1)
                                            <span class="badge badge-success">active</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('browse')
                                            <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>
                                        @endcan
                                        @can('edit')
                                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                        @endcan
                                        @can('delete')
                                            <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('posts.destroy', ['id' => $post->id]) }}" data-id="" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $posts->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.delete').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $('.delete-form').attr('action', url);
            });
        })
    </script>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <form action="" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="background-color: red">
                        <h4 class="modal-title" style="color: #FFFFFF; vertical-align: middle" > Are you sure you want to delete this post?</h4>
                        <button type="button" class="close" data-dismiss="modal" style="vertical-align: middle; margin-top: -20px;">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: red; color: white">Yes, Delete this post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
