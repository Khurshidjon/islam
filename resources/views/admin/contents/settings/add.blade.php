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
                $('#filename').trigger('click');
            });


        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var title_reult = $('.title-result');
                    title_reult.remove();
                    $('.upload-result')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Add setting</h2>
                <br>
                <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="key">Key <span style="color: red">*</span></label>
                                <input type="text" name="key" id="key" class="form-control {{ $errors->has('key') ? ' is-invalid' : '' }}" placeholder="key" value="{{ old('key') }}">
                                @if ($errors->has('key'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('key') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="url">Url <span style="color: red"></span></label>
                                <input type="text" name="url" id="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="url" value="{{ old('url') }}">
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
                                    <span class="title-result text-secondary" style="position: relative; top: 60px">
                                        <button class="btn btn-outline-info">
                                            <i class="fas fa-image"></i>
                                         </button>
                                    </span>
                                    <img class="upload-result" src="" alt="" style="width: 100%">
                                </div>
                                <input style="display: none" type="file" accept="image/jpeg, image/jpg, image/png" onchange="readURL(this);"  name="img" id="filename" class="form-control {{ $errors->has('img') ? ' is-invalid' : '' }}" value="{{ old('img') }}">
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="tab-content">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home">UZB</a>
                                </li>
                            </ul>
                            <div id="home" class="container tab-pane active"><br>
                                <label for="val">Value <span style="color: red">*</span></label>
                                <input id="val" type="text" class="form-control {{ $errors->has('val') ? ' is-invalid' : '' }}" name="val" placeholder="Settings value" value="{{ old('val') }}" autocomplete="off">
                                @if ($errors->has('val'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('val') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('description', {
            language: 'ru',
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
        });
    </script>
@endsection
