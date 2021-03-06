@extends('layouts.admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="{{ asset('toast/toastr.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('toast/toastr.css') }}">
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
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="mb-5">
                    <a href="{{ route('menus.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Menu</button></a>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table-bordered table-hover w-100">
                        <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Menu name</th>
                                <th>Order By</th>
                                <th>url</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
	                    <tbody>
                                @php
                                    $i = 1;
                                    $k = 1;
                                    $lang = App::getLocale();
                                @endphp
                                @foreach($menus as $menu)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="pl-3">
                                            {{ $menu->name }}
                                        </td>
                                        <td style="text-align: center">
                                            <input type="number" value="{{ $menu->order }}" data-link="{{ route('menus.order') }}" data-menu_id="{{ $menu->id }}" min="1" max="{{ count($menus) }}" class="form-control orderBy" style="text-align: center">
                                        </td>
                                        <td class="pl-3">
                                            {{ $menu->url }}
                                        </td>
                                        <td style="text-align: center">
                                            @if($menu->status == 0)
                                                <span class="badge badge-danger">deactive</span>
                                            @elseif($menu->status == 1)
                                                <span class="badge badge-success">active</span>
                                            @elseif($menu->status == 2)
                                                <span class="badge badge-info">active & parnet</span>
                                            @endif
                                        </td>

                                        <td style="text-align: center">
                                            <a href="{{ route('menus.show', ['id' => $menu->id]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>
                                            <a href="{{ route('menus.edit', ['id' => $menu->id]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                            @can('delete')
                                            <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('menus.destroy', ['id' => $menu->id]) }}" data-id="" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    {{ $menus->links('vendor.pagination.default') }}
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
            $('.orderBy').on('input', function (e) {
                e.preventDefault();
                var order_by = $(this).val();
                var menu_id = $(this).attr('data-menu_id');
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
                        menu_id:menu_id,
                    },
                    success:function (data) {

                        if (data == 'ok'){
                            toastr.success(
                                'Sort of menu has been updated successfully'
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
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <form action="" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="background-color: red">
                        <h4 class="modal-title" style="color: #FFFFFF; vertical-align: middle" > Are you sure you want to delete this menu?</h4>
                        <button type="button" class="close" data-dismiss="modal" style="vertical-align: middle; margin-top: -20px;">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: red; color: white">Yes, Delete this menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
