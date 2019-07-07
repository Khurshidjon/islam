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
                            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <br>
                                        <label for="menu_uz">Kategoriya nomi</label>
                                        <input id="menu_uz" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category_uz!=null?$category_uz->name:'' }}" placeholder="Kategoriya nomi">
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
                                            <option value="1" {{ $category->status==1?'selected':'' }}>Active</option>
                                            <option value="0" {{ $category->status==0?'selected':'' }}>Deactive</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="menu_ru">Название категорию</label>
                                        <input id="menu_ru" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category_ru!=null?$category_ru->name:'' }}" placeholder="Название">
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
                            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="menu_en">Category name</label>
                                        <input id="menu_en" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category_en!=null?$category_en->name:'' }}" placeholder="Category name">
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
                            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="menu_ar" style="float: right">Kategoiya nomi Arabcha</label>
                                        <input id="menu_ar" type="text" lang="ar" style="direction:rtl" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category_ar!=null?$category_ar->name:'' }}" placeholder="Arab tilida">
                                        <input type="hidden" value="{{ $ar!=null?$ar->id:'' }}" name="lang_id">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <button type="submit" class="btn btn-outline-success mt-3 float-right">Jo'natmoq</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="menu5" class="container tab-pane fade"><br>
                            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="menu_tr">Kategoriya nomi Turkcha</label>
                                        <input id="menu_tr" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category_tr!=null?$category_tr->name:'' }}" placeholder="Turk tilida">
                                        <input type="hidden" value="{{ $tr->id }}" name="lang_id">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <button type="submit" class="btn btn-outline-success mt-3">Jo'natmoq</button>
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
