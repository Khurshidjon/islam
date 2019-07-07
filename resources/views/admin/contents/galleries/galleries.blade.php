@extends('layouts.admin')
@section('content')
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
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="mb-5">
                    <a href="{{ route('galleries.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Gallery</button></a>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table-bordered table-hover w-100">
                        <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Galleries by album</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $lang = App::getLocale();
                            @endphp
                            
                            @foreach($galleries as $gallery)
                                @php
                                    $user = \App\User::find($gallery->user_id);
                                    $album = DB::table('album_lang')->where('album_id', $gallery->album->id)->where('lang_id', 1)->first();
                                @endphp
                                <tr style="text-align: center">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $album->title }}</td>
                                    <td>{{ $user->firstname . ' ' . $user->lastname}}</td>
                                    <td>
                                        @if($gallery->status == 1)
                                            <span class="badge badge-success">active</span>
                                        @else
                                            <span class="badge badge-danger">deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('galleries.edit', ['id' => $gallery->id]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                        <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('galleries.destroy', ['id' => $gallery->id]) }}" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    {{ $galleries->links('vendor.pagination.default') }}
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
                        <h4 class="modal-title" style="color: #FFFFFF; vertical-align: middle" > Are you sure you want to delete this gallery?</h4>
                        <button type="button" class="close" data-dismiss="modal" style="vertical-align: middle; margin-top: -20px;">
                            <i class="fa fa-close text-white"></i>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: red; color: white">Yes, Delete this gallery</button>
                    </div>
                </form>
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
            $('.orderBy').on('input', function (e) {
                e.preventDefault();
                var order_by = $(this).val();
                var album_id = $(this).attr('data-album_id');
                var url = $(this).attr('data-link');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:url,
                    data:{
                        order_by:order_by,
                        album_id:album_id,
                    },
                    success:function (data) {
                        console.log(data);

                        if (data == 'ok'){
                            toastr.success(
                                'Sort of album has been updated successfully'
                            )
                        }
                        else if (data == 'error'){
                            toastr.error(
                                'Whoops :( You entered incorrect number for sort'
                            )
                        }
                    }
                })

            });
        })
    </script>
@endsection
