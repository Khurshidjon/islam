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
                <div class="table-responsive mb-5">
                    <table class="table-bordered table-hover w-100">
                        <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone</th>
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
                                @foreach($messages as $message)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="pl-3">
                                            {{ $message->firstname }}
                                        </td>
                                        <td class="pl-3">
                                            {{ $message->lastname }}
                                        </td>
                                        <td class="pl-3">
                                            {{ $message->email }}
                                        </td>
                                        <td class="pl-3">
                                            {{ $message->phone }}
                                        </td>
                                        <td style="text-align: center">
                                            @if($message->status == 0)
                                                <span class="badge badge-danger">unread</span>
                                            @elseif($message->status == 1)
                                                <span class="badge badge-success">read</span>
                                            @endif
                                        </td>

                                        <td style="text-align: center">
                                            <a href="{{ route('messages.show', ['message' => $message]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    {{ $messages->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
@endsection
