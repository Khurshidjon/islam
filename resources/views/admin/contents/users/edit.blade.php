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
                        <label for="firstname">Firstname <span style="color: red"></span></label>
                        <input id="firstname" type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="Firstname" value="{{ old('firstname', $user->firstname) }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="lastname">Lastname <span style="color: red"></span></label>
                        <input id="lastname" type="text" disabled name="lastname" class="form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="Lastname" value="{{ old('lastname', $user->lastname) }}">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Email <span style="color: red"></span></label>
                        <input type="text" name="email" disabled class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="mail@example.com" value="{{ old('email', $user->email) }}">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h4><b>Permissions</b></h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="list-inline">
                                    @if($user->permissions)
                                        <span>Has permissions</span>
                                        @foreach($user->permissions as $permission)
                                            <form action="{{ route('users-permission.detach', ['permission' => $permission, 'user' => $user]) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn bg-transparent form-control list-group-item">
                                            <span class="float-left">
                                                {{ $permission->name }}
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
                                    <span>Other permissions</span>
                                    @foreach($permissions->diff($user->permissions) as $permission)
                                        <form action="{{ route('users-permission.attach', ['permission' => $permission, 'user' => $user]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn bg-transparent form-control list-group-item">
                                            <span class="float-left">
                                                {{ $permission->name }}
                                            </span>
                                                <i class="fas fa-plus-circle mt-1 float-right text-success"></i>
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4><b>Roles</b></h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="list-inline">
                                    @if($user->roles)
                                        <span>Has roles</span>
                                        @foreach($user->roles as $role)
                                            <form action="{{ route('users-role.detach', ['role' => $role, 'user' => $user]) }}" method="post">
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
                                    <span>Other roles</span>
                                    @foreach($roles->diff($user->roles) as $role)
                                        <form action="{{ route('users-role.attach', ['role' => $role, 'user' => $user]) }}" method="post">
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
