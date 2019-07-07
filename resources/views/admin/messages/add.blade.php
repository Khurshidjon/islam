@extends('layouts.admin')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Yangi menyu qo'shish</h2>
                <br>
                <form action="{{ route('menus.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-9">
                            <div class="tab-content">
                                <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#menu1" style="text-transform: uppercase">O'zbekcha</a>
                                        </li>
                                </ul>
                                    <div class="container tab-pane active" id="menu1"><br>
                                        <label for="url">Menyu havolasi</label>
                                        <input id="url" type="text" name="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="/examples/example">
                                        @if ($errors->has('url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                        <label for="name">Menyu nomi</label>
                                        <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="O'zbekcha">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="status">Status <span style="color: red">*</span></label>
                            <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                <option selected disabled>-- bittasini tanlang --</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                            <br>
                            <label for="position">Position <span style="color: red">*</span></label>
                            <select name="position" id="position" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}">
                                <option selected disabled>-- bittasini tanlang --</option>
                                <option value="1">Header</option>
                                <option value="2">Footer</option>
                            </select>
                            @if ($errors->has('position'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('position') }}</strong>
                                </span>
                            @endif
                            <br>
                            <label for="parent_id">Menyuga biriktirmoq</label>
                            <select name="parent_id" id="parent_id" class="form-control {{ $errors->has('parent_id') ? ' is-invalid' : '' }}">
                                <option selected disabled>-- bittasini tanlang --</option>
                                @foreach($menus as $menu)
                                    @if($lang=='uz')
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @elseif($lang=='ru')
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @elseif($lang=='en')
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('parent_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('parent_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
