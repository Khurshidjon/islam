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
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="mb-5">
                    <h3>Users</h3>
                    @can('add')
                        <a href="{{ route('users.add') }}" class="btn btn-success mt-3">Add User</a>
                    @endcan
                </div>
                <div class="table-responsive mb-5">
                    <table class="table-bordered table-hover w-100">
                        <thead>
                        <tr style="text-align: center">
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Img</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                            $lang = App::getLocale();
                        @endphp

                        @foreach($users as $user)
                            <tr style="text-align: center">
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage') . '/' . $user->avatar}}" alt="" style="width: 40px">
                                </td>
                                <td>
                                    {{--<a href="{{ route('users.show', ['address' => $item]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>--}}
                                    @if(Auth::user()->hasRole('admin'))
                                        <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                    @can('delete')
                                        <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('users.destroy', ['user' => $user]) }}" data-id="" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                        <h4 class="modal-title" style="color: #FFFFFF; vertical-align: middle" > Are you sure you want to delete this object photo?</h4>
                        <button type="button" class="close" data-dismiss="modal" style="vertical-align: middle; margin-top: -20px;">
                            <i class="fa fa-close text-white"></i>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: red; color: white">Yes, Delete this object photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
