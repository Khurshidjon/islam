@extends('layouts.admin')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Yangi kategoriya qo'shish</h2>
                <br>
                <form action="{{ route('categories.store') }}" method="post">
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
                                        <br>
                                        <label for="name">kategoriya nomi</label>
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
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
