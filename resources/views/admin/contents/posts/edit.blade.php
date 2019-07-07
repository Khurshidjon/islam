@extends('layouts.admin')
@section('content')
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
            <div class="container">
                <h2>Edit post</h2>
                <br>
                <div class="tab-content">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#post_uz">UZB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#post_ru">RUS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#post_en">ENG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#post_ar">ARABIC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#post_tr">TURKISH</a>
                        </li>
                    </ul>

                    <div id="post_uz" class="container tab-pane active"><br>
                        <form action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="lang_id" value="{{ $uz->id }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="status">Status <span style="color: red">*</span></label>
                                    <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                        <option selected disabled>-- bittasini tanlang --</option>
                                        <option value="1" {{$post->status==1?'selected':''}}>Active</option>
                                        <option value="0" {{$post->status==0?'selected':''}}>Deactive</option>
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
                                            <option value="{{ $category->id }}" {{ $post->category_id==$category->id?'selected':''}}> {{ $category->name }}</option>
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
                                    <input id="event_date" name="event_date" type="date" value="{{ $post->event_date }}" style="border: 1px solid #a9b3c9">
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
                                    <div class="text-center">
                                        <label for="null_image">NULL</label>
                                        <input id="null_image" type="checkbox" name="null_image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label for="banner">Banner</label>
                                    <input id="banner" type="checkbox" name="banner" {{ $post->banner==1?'checked':'' }} class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>

                            <label for="title">Title UZ <span style="color: red">*</span></label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Post title" value="{{ old('title', $post_uz->title) }}" autocomplete="off">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                            <br>
                            <label for="description_uz">Description UZ <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="description" id="description_uz" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description', $post_uz->description) }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            <hr>
                            <label for="content_uz">Content UZ <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="body" id="content_uz" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('body') ? ' is-invalid' : '' }}">{{ old('body', $post_uz->content) }}</textarea>
                            @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="post_ru" class="container tab-pane"><br>
                        <form action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="lang_id" value="{{ $ru->id }}">
                            <label for="title">Title RUSSIA <span style="color: red">*</span></label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Post title" value="{{ $post_ru!=null?old('title', $post_ru->title):'' }}" autocomplete="off">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                            <br>
                            <label for="description_ru">Description RUSSIA <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="description" id="description_ru" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $post_ru!=null?old('description', $post_ru->description):'' }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                            <hr>
                            <label for="content_ru">Content RUSSIA <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="body" id="content_ru" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('body') ? ' is-invalid' : '' }}">{{ $post_ru!=null?old('body', $post_ru->content):'' }}</textarea>
                            @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="post_en" class="container tab-pane"><br>
                        <form action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="lang_id" value="{{ $en->id }}">
                            <label for="title">Title ENGLISH <span style="color: red">*</span></label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Post title" value="{{ $post_en!=null?old('title', $post_en->title):'' }}" autocomplete="off">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                            <br>
                            <label for="description_en">Description ENGLISH <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="description" id="description_en" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $post_en!=null?old('description', $post_en->description):'' }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                            <hr>
                            <label for="content_en">Content ENGLISH <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="body" id="content_en" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('body') ? ' is-invalid' : '' }}">{{ $post_en!=null?old('body', $post_en->content):'' }}</textarea>
                            @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                            <button type="submit" class="btn btn-outline-secondary">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="post_ar" class="container tab-pane"><br>
                        <form action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="lang_id" value="{{ $ar->id }}">
                            {{--uz form--}}
                            <label for="title">Title ARABIC <span style="color: red">*</span></label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Post title" value="{{ $post_ar!=null?old('title', $post_ar->title):'' }}" autocomplete="off">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                            <br>
                            <label for="description_ar">Description ARABIC <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="description" id="description_ar" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $post_ar!=null?old('description', $post_ar->description):'' }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            <hr>
                            <label for="content_ar">Content ARABIC <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="body" id="content_ar" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('body') ? ' is-invalid' : '' }}">{{ $post_ar!=null?old('body', $post_ar->content):'' }}</textarea>
                            @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="btn btn-outline-secondary">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="post_tr" class="container tab-pane"><br>
                        <form action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="lang_id" value="{{ $tr->id }}">
                            <label for="title">Title TURKISH <span style="color: red">*</span></label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Post title" value="{{ $post_tr!=null?old('title', $post_tr->title):'' }}" autocomplete="off">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                            <br>
                            <label for="description_tr">Description TURKISH <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="description" id="description_tr" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $post_tr!=null?old('description', $post_tr->description):'' }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                            <hr>
                            <label for="content_tr">Content TURKISH <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="body" id="content_tr" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('body') ? ' is-invalid' : '' }}">{{ $post_tr!=null?old('body', $post_tr->content):'' }}</textarea>
                            @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                            @endif
                            <button type="submit" class="btn btn-outline-secondary">Jo'natmoq</button>
                        </form>
                    </div>
                </div>
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

        CKEDITOR.replace( 'description_uz', options);
        CKEDITOR.replace( 'description_ru', options);
        CKEDITOR.replace( 'description_en', options);
        CKEDITOR.replace( 'description_ar', options);
        CKEDITOR.replace( 'description_tr', options);
        CKEDITOR.replace( 'content_uz', options);
        CKEDITOR.replace( 'content_ru', options);
        CKEDITOR.replace( 'content_en', options);
        CKEDITOR.replace( 'content_ar', options);
        CKEDITOR.replace( 'content_tr', options);
    </script>
@endsection
