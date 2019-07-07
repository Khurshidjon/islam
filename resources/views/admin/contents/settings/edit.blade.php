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
        $(function () {
            $('.btn-for-upload').on('click', function (e) {
                e.preventDefault();
                $(this).next().trigger('click');
            });

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var title_result = $('.title-result');
                    title_result.remove();
                    $('.upload-result')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
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
                <h2>Update site settings</h2>
                <br>
                    <div class="form-group">
                        <br>
                        <div class="tab-content">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1">UZBEK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab2">RUSSIAN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab3">ENGLISH</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab4">ARABIC</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab5">TURKISH</a>
                                </li>
                            </ul>

                    <div id="tab1" class="container tab-pane active"><br>
                        <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $uz->id }}" name="lang_id">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="key">Key <span style="color: red">*</span></label>
                                        <input disabled type="text" name="key" id="key" class="form-control {{ $errors->has('key') ? ' is-invalid' : '' }}" placeholder="key" value="{{ old('key', $setting->key) }}">
                                        @if ($errors->has('key'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('key') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="url">Url <span style="color: red"></span></label>
                                        <input type="text" name="url" id="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="url" value="{{ old('url', $setting->url) }}">
                                        @if ($errors->has('url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="filename">Settings img
                                            <span style="color: red"></span>
                                        </label>
                                        <div class="btn-for-upload" type="btn" style="cursor: pointer; border: 1px dashed darkgrey; text-align: center; min-height: 10em !important;">
                                        <span class="title-result text-secondary" style="position: absolute; top: 60px; text-align: center"></span>
                                            @if(isset($setting_uz->img) && !empty($setting_uz->img))
                                                <img class="upload-result" src="{{ asset('storage') .'/'. $setting_uz->img }}" alt="" style="width: 100%">
                                            @else
                                                <img class="upload-result" src="" alt="" style="width: 100%">
                                            @endif
                                        </div>
                                        <input style="display: none" type="file" accept="image/jpeg, image/jpg, image/png" onchange="readURL(this);"  name="img" class="form-control image {{ $errors->has('img') ? ' is-invalid' : '' }}">
                                        @if ($errors->has('img'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('img') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            <hr>
                            <label for="title_uz">Settings UZ</label>
                            <input id="title_uz" type="text" class="form-control {{ $errors->has('key') ? ' is-invalid' : '' }}" name="val" placeholder="Settings value" value="{{ $setting_uz!=null?old('val', $setting_uz->val):'' }}" autocomplete="off">
                            @if ($errors->has('val'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('val') }}</strong>
                                </span>
                            @endif
                                <hr>
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>

                            </div>
                        </form>
                    </div>
                    <div id="tab2" class="container tab-pane"><br>
                        <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $ru->id }}" name="lang_id">

                            <div class="col-md-4">
                                <label for="filename">Settings img
                                    <span style="color: red">*</span>
                                </label>
                                <div class="btn-for-upload" type="btn" style="cursor: pointer; border: 1px dashed darkgrey; text-align: center; min-height: 10em !important;">
                                    <span class="title-result text-secondary" style="position: absolute; top: 60px; text-align: center"></span>
                                    @if(isset($setting_ru->img) && !empty($setting_ru->img))
                                        <img class="upload-result" src="{{ asset('storage') .'/'. $setting_ru->img}}" alt="" style="width: 100%">
                                    @else
                                        <img class="upload-result" src="" alt="" style="width: 100%">
                                    @endif
                                </div>
                                <input style="display: none" type="file" accept="image/jpeg, image/jpg, image/png" onchange="readURL(this);"  name="img" class="form-control image {{ $errors->has('img') ? ' is-invalid' : '' }}">
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <hr>
                            <label for="title_ru">Settings value RUS <span style="color: red">*</span></label>
                            <input id="title_ru" type="text" class="form-control {{ $errors->has('val') ? ' is-invalid' : '' }}" name="val" placeholder="settings value" value="{{ $setting_ru!=null?old('val', $setting_ru->val):'' }}" autocomplete="off">
                            @if ($errors->has('val'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('val') }}</strong>
                                </span>
                            @endif
                            <hr>
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="tab3" class="container tab-pane"><br>
                        <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $en->id }}" name="lang_id">
                            <div class="col-md-4">
                                <label for="filename">Settings img
                                    <span style="color: red">*</span>
                                </label>
                                <div class="btn-for-upload" type="btn" style="cursor: pointer; border: 1px dashed darkgrey; text-align: center; min-height: 10em !important;">
                                    <span class="title-result text-secondary" style="position: absolute; top: 60px; text-align: center"></span>
                                    @if(isset($setting_en->img) && !empty($setting_en->img))
                                        <img class="upload-result" src="{{ asset('storage') .'/'. $setting_en->img}}" alt="" style="width: 100%">
                                    @else
                                        <img class="upload-result" src="" alt="" style="width: 100%">
                                    @endif
                                </div>
                                <input style="display: none" type="file" accept="image/jpeg, image/jpg, image/png" onchange="readURL(this);"  name="img"  class="form-control image {{ $errors->has('img') ? ' is-invalid' : '' }}" value="{{ $setting->img }}">
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="title_en">Settings value EN <span style="color: red">*</span></label>
                            <input id="title_en" type="text" class="form-control {{ $errors->has('val') ? ' is-invalid' : '' }}" name="val" placeholder="settings value" value="{{ $setting_en!=null?old('val', $setting_en->val):'' }}" autocomplete="off">
                            @if ($errors->has('val'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('val') }}</strong>
                                </span>
                            @endif
                            <hr>
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="tab4" class="container tab-pane"><br>
                        <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $ar->id }}" name="lang_id">

                            <div class="col-md-4">
                                <label for="filename">Settings img
                                    <span style="color: red">*</span>
                                </label>
                                <div class="btn-for-upload" type="btn" style="cursor: pointer; border: 1px dashed darkgrey; text-align: center; min-height: 10em !important;">
                                    <span class="title-result text-secondary" style="position: absolute; top: 60px; text-align: center"></span>
                                    @if(isset($setting_ar->img) && !empty($setting_ar->img))
                                        <img class="upload-result" src="{{ asset('storage') .'/'. $setting_ar->img}}" alt="" style="width: 100%">
                                    @else
                                        <img class="upload-result" src="" alt="" style="width: 100%">
                                    @endif
                                </div>
                                <input style="display: none" type="file" accept="image/jpeg, image/jpg, image/png" onchange="readURL(this);"  name="img" class="form-control image {{ $errors->has('img') ? ' is-invalid' : '' }}">
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <hr>
                            <label for="title_ar">Settings value AR <span style="color: red">*</span></label>
                            <input id="title_ar" type="text" class="form-control {{ $errors->has('val') ? ' is-invalid' : '' }}" name="val" placeholder="settings value" value="{{ $setting_ar!=null?old('val', $setting_ar->val):'' }}" autocomplete="off">
                            @if ($errors->has('val'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('val') }}</strong>
                                </span>
                            @endif
                            <hr>
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="tab5" class="container tab-pane"><br>
                        <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $tr->id }}" name="lang_id">
                            <div class="col-md-4">
                                <label for="filename">Settings img
                                    <span style="color: red">*</span>
                                </label>
                                <div class="btn-for-upload" type="btn" style="cursor: pointer; border: 1px dashed darkgrey; text-align: center; min-height: 10em !important;">
                                    <span class="title-result text-secondary" style="position: absolute; top: 60px; text-align: center"></span>
                                    @if(isset($setting_tr->img) && !empty($setting_tr->img))
                                        <img class="upload-result" src="{{ asset('storage') .'/'. $setting_tr->img}}" alt="" style="width: 100%">
                                    @endif
                                </div>
                                <input style="display: none" type="file" accept="image/jpeg, image/jpg, image/png" onchange="readURL(this);"  name="img" class="form-control image {{ $errors->has('img') ? ' is-invalid' : '' }}" value="{{ $setting->img }}">
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <hr>
                            <label for="title_tr">Albom nomi TURK <span style="color: red">*</span></label>
                            <input id="title_tr" type="text" class="form-control {{ $errors->has('val') ? ' is-invalid' : '' }}" name="val" placeholder="Settings value" value="{{ $setting_tr!=null?old('val', $setting_tr->val):'' }}" autocomplete="off">
                            @if ($errors->has('val'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('val') }}</strong>
                                </span>
                            @endif
                            <hr>
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
