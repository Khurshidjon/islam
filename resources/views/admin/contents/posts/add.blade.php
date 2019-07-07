@extends('layouts.admin')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 80px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
    </style>
    <script>
        $(function () {
            $('#status').select2();
            $('#category').select2();
            $('.post-img-button').on('click', function (e) {
                e.preventDefault();
                $('#img').trigger('click');
            });
        })
    </script>

    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Add post</h2>
                <br>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
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
                            <div class="col-md-3">
                                <label for="category">Category <span style="color: red">*</span></label>
                                <select name="category" id="category" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}">
                                    <option selected disabled>-- bittasini tanlang --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label for="event_date">Event date <i class="fas fa-calendar-alt"></i></label>
                                <input id="event_date" name="event_date" type="date" style="border: 1px solid #a9b3c9">
                            </div>
                            <div class="col-md-2">
                                <label for="img">Post rasmi</label>
                                <button class="btn btn-outline-secondary post-img-button {{ $errors->has('img') ? ' is-invalid' : '' }}">
                                    Rasm yuklang
                                </button>
                                <input style="display: none" id="img" type="file" name="img" accept="image/jpeg, image/jpg, image/png" class="form-control {{ $errors->has('img') ? ' is-invalid' : '' }}">
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-1">
                                <label for="banner">Banner</label>
                                <input id="banner" type="checkbox" name="banner" class="form-control">
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
                                {{--uz form--}}
                                <label for="title">Title UZ <span style="color: red">*</span></label>
                                <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Post title" value="{{ old('title') }}" autocomplete="off">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <label for="description">Description UZ <span style="color: red">*</span></label>
                                <div id="toolbar-container1"></div>
                                <textarea name="description" id="description" cols="30" rows="7" class="form-control description {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                <hr>
                                <label for="content">Content UZ <span style="color: red">*</span></label>
                                <div id="toolbar-container1"></div>
                                <textarea name="body" id="content" cols="30" rows="7" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}">{{ old('body') }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary">Jo'natmoq</button>
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

        CKEDITOR.replace( 'description', options);
        CKEDITOR.replace( 'content', options);


    </script>
@endsection
