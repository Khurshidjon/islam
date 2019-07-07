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
                <h2>Update object photo</h2>
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
                        <form action="{{ route('comments.update', ['comment' => $comment]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $uz->id }}" name="lang_id">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="status">Status <span style="color: red">*</span></label>
                                    <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                        <option selected disabled>-- bittasini tanlang --</option>
                                        <option value="1" {{ $comment->status==1?'selected':'' }}>Active</option>
                                        <option value="0" {{ $comment->status==0?'selected':'' }}>Deactive</option>
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
                                    <span class="title-result text-secondary" style="position: absolute; top: 6em; left: 45%">
                                        <button class="btn btn-outline-info">
                                            <i class="fas fa-image"></i>
                                         </button>
                                    </span>
                                        <img class="upload-result" src="{{ asset('storage') .'/'. $comment->image}}" alt="" style="width: 100%">
                                    </div>
                                    <input style="display: none" type="file" accept="image/jpeg, image/jpg, image/png" onchange="readURL(this);"  name="image" id="filename" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image', $comment->image) }}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <label for="title_uz">Comment yozuvchi ismi</label>
                            <input id="title_uz" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Username" value="{{ old('name', $comment->name) }}" autocomplete="off">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <hr>
                            <label for="description_uz">Comment UZ <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="text" id="description_uz" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('text') ? ' is-invalid' : '' }}">{{ $comment_uz!=null?old('text', $comment_uz->text):'' }}</textarea>
                            @if ($errors->has('text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="tab2" class="container tab-pane"><br>
                        <form action="{{ route('comments.update', ['comment' => $comment ]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $ru->id }}" name="lang_id">
                            <label for="description_ru">Description RUS <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="text" id="description_ru" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('text') ? ' is-invalid' : '' }}">{{ $comment_ru!=null?old('text', $comment_ru->text):'' }}</textarea>
                            @if ($errors->has('text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="tab3" class="container tab-pane"><br>
                        <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $en->id }}" name="lang_id">
                            <label for="description_en">Comment EN <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="text" id="description_en" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $comment_en!=null?old('text', $comment_en->text):'' }}</textarea>
                            @if ($errors->has('text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="tab4" class="container tab-pane"><br>
                        <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $ar->id }}" name="lang_id">
                            <hr>
                            <label for="description_ar">Comment AR <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="text" id="description_ar" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('text') ? ' is-invalid' : '' }}">{{ $comment_ar!=null?old('text', $comment_ar->text):'' }}</textarea>
                            @if ($errors->has('text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
                    <div id="tab5" class="container tab-pane"><br>
                        <form action="{{ route('comments.update', ['id' => $comment->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $tr->id }}" name="lang_id">
                            <hr>
                            <label for="description_tr">Comment TURK <span style="color: red">*</span></label>
                            <div id="toolbar-container1"></div>
                            <textarea name="text" id="description_tr" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}">{{ $comment_tr!=null?old('text', $comment_tr->text):'' }}</textarea>
                            @if ($errors->has('text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                        </form>
                    </div>
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

    </script>
@endsection
