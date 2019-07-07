@extends('layouts.admin')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
<div class="main-content bg-white border-left">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <h2>Add navbar menu</h2>
            <br>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#menu1">UZBEK</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">РУССКИЙ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu3">ENGLISH</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu4">اللغة العربية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu5" style="text-transform: uppercase">Türkçe</a>
                            </li>
                        </ul>

                        <div id="menu1" class="container tab-pane active"><br>
                            <form action="{{ route('menus.update', ['id' => $menu->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="url">Menyu havolasi</label>
                                        <input id="url" type="text" name="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}"  value="{{ $menu!=null?$menu->url:'' }}" placeholder="/examples/example">
                                        @if ($errors->has('url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                        <label for="menu_uz">Menu nomi</label>
                                        <input id="menu_uz" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $menu_uz!=null?$menu_uz->name:'' }}" placeholder="Menu nomi">
                                        <input type="hidden" value="{{ $uz->id }}" name="lang_id">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <button type="submit" class="btn btn-outline-success mt-3">Jo'natmoq</button>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="status">Status <span style="color: red">*</span></label>
                                        <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                            <option disabled>-- bittasini tanlang --</option>
                                            <option value="1" {{ $menu->status==1?'selected':'' }}>Active</option>
                                            <option value="0" {{ $menu->status==0?'selected':'' }}>Deactive</option>
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
                                            <option value="1" {{ $menu->position==1?'selected':'' }}>Header</option>
                                            <option value="2" {{ $menu->position==2?'selected':'' }}>Footer</option>
                                        </select>
                                        @if ($errors->has('position'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                        <label for="parent_id">Menyuga biriktirmoq</label>
                                        <select name="parent" id="parent_id" class="form-control {{ $errors->has('parent') ? ' is-invalid' : '' }}">
                                            <option selected disabled>-- bittasini tanlang --</option>
                                            @foreach($menus as $item)
                                                <option value="{{ $item->id }}" {{ $menu->parent==$item->id?'selected':'' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('parent_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('parent_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <form action="{{ route('menus.update', ['id' => $menu->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="menu_ru">Название меню</label>
                                        <input id="menu_ru" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $menu_ru!=null?$menu_ru->name:'' }}" placeholder="Название меню">
                                        <input type="hidden" value="{{ $ru->id }}" name="lang_id">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <button type="submit" class="btn btn-outline-success mt-3">Отправить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="menu3" class="container tab-pane fade"><br>
                            <form action="{{ route('menus.update', ['id' => $menu->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="menu_en">Menu name</label>
                                        <input id="menu_en" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $menu_en!=null?$menu_en->name:'' }}" placeholder="Menu name">
                                        <input type="hidden" value="{{ $en->id }}" name="lang_id">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <button type="submit" class="btn btn-outline-success mt-3">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="menu4" class="container tab-pane fade"><br>
                            <form action="{{ route('menus.update', ['id' => $menu->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="menu_ar" style="float: right">اسم القائمة </label>
                                        <input id="menu_ar" type="text" lang="ar" style="direction:rtl" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $menu_ar!=null?$menu_ar->name:'' }}" placeholder="اسم القائمة">
                                        <input type="hidden" value="{{ $ar!=null?$ar->id:'' }}" name="lang_id">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <button type="submit" class="btn btn-outline-success mt-3 float-right">لإرسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="menu5" class="container tab-pane fade"><br>
                            <form action="{{ route('menus.update', ['id' => $menu->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="menu_tr">Menü ismi</label>
                                        <input id="menu_tr" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $menu_tr!=null?$menu_tr->name:'' }}" placeholder="Menü ismi">
                                        <input type="hidden" value="{{ $tr->id }}" name="lang_id">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <button type="submit" class="btn btn-outline-success mt-3">Göndermek için</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
