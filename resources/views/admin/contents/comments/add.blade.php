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
                <h2>Add new comment</h2>
                <br>
                <form action="{{ route('comments.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <label for="filename">Izoh yozuvchi shaxs rasmi
                                    <span style="color: red">*</span>
                                </label>
                                <div class="btn-for-upload" type="btn" style="cursor: pointer; border: 1px dashed darkgrey; text-align: center; min-height: 10em !important;">
                                    <span class="title-result text-secondary" style="position: relative; top: 60px">
                                        <button class="btn btn-outline-info">
                                            <i class="fas fa-image"></i>
                                         </button>
                                    </span>
                                    <img class="upload-result" src="" alt="" style="width: 100%">
                                </div>
                                <input style="display: none" type="file" accept="image/jpeg, image/jpg, image/png" onchange="readURL(this);"  name="image" id="filename" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
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
                                <label for="name">Yozuvchi ismi <span style="color: red">*</span></label>
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Username" value="{{ old('name') }}" autocomplete="off">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <hr>
                                <label for="text">Izoh O'zbek tilida <span style="color: red">*</span></label>
                                <div id="toolbar-container1"></div>
                                <textarea name="text" id="text" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('text') ? ' is-invalid' : '' }}">{{ old('text') }}</textarea>
                                @if ($errors->has('text'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text') }}</strong>
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

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        CKEDITOR.replace( 'text', options);

    </script>
@endsection
