@extends('layouts.admin')
@section('content')

@php
    $lang = App::getLocale();
@endphp

<style>
    .ck-editor__editable {
        min-height: 400px;
    }
</style>
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
            <h2>Update user permission</h2>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Permission name <span style="color: red"></span></label>
                        <input type="text" class="form-control" value="{{ $permission->name }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label>Guard name <span style="color: red"></span></label>
                        <input type="text" disabled class="form-control" placeholder="permission" value="{{ $permission->guard_name }}">
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('permission.create') }}" method="post">
                            @csrf
                            <label for="role">Add new role <span style="color: red"></span></label>
                            <input id="role" type="text" name="role" class="form-control" placeholder="role" value="{{ old('role') }}">
                            <button type="submit" class="btn btn-outline-success float-right">Create role</button>
                        </form>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>Roles</b></h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="list-inline">
                                    @if($permission->roles)
                                        <span>Has roles</span>
                                        @foreach($permission->roles as $role)
                                            <form action="{{ route('role-permission.detach', ['permission' => $permission, 'role' => $role]) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn bg-transparent form-control list-group-item">
                                                    <span class="float-left">
                                                        {{ $role->name }}
                                                    </span>
                                                    <i class="fas fa-minus-circle mt-1 float-right text-danger"></i>
                                                </button>
                                            </form>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="list-inline">
                                    <span>Other role</span>
                                    @foreach($roles->diff($permission->roles) as $role)
                                        <form action="{{ route('role-permission.attach', ['permission' => $permission, 'role' => $role]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn bg-transparent form-control list-group-item">
                                            <span class="float-left">
                                                {{ $role->name }}
                                            </span>
                                                <i class="fas fa-plus-circle mt-1 float-right text-success"></i>
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
