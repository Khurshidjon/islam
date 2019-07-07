@extends('layouts.admin')
@section('content')

    @php
        $lang = App::getLocale();
    @endphp

    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
        .page-heading {
            margin: 20px 0;
            color: #666;
            -webkit-font-smoothing: antialiased;
            font-family: "Segoe UI Light", "Arial", serif;
            font-weight: 600;
            letter-spacing: 0.05em;
        }

        #my-dropzone .message {
            font-family: "Segoe UI Light", "Arial", serif;
            font-weight: 600;
            color: #0087F7;
            font-size: 1.5em;
            letter-spacing: 0.05em;
        }

        .dropzone {
            display: block;
            width: 100%;
            min-height: 200px;
            box-sizing: border-box;
            border: 2px dashed #A2B4CA;
            border-radius: 3px;
            padding: 0;
            background-color: #FCFCFC;
            background-image: url({{ asset('admin_files/image_uploader/fancy_upload.png') }});
            background-repeat: no-repeat;
            background-position: center center;
            opacity: 0.5;
            cursor: not-allowed;
            outline: none;
        }

        .green{
            background-color:#6fb936;
        }
        .thumb{
            margin-bottom: 30px;
        }

        .page-top{
            margin-top:85px;
        }


        img.zoom {
            width: 100%;
            height: 200px;
            border-radius:5px;
            object-fit:cover;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
        }


        .transition {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
        .modal-header {

            border-bottom: none;
        }
        .modal-title {
            color:#000;
        }
        .modal-footer{
            display:none;
        }
    </style>

    <script>
        $(function () {
            $('#status').select2();
            $('#album').select2();
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function(){

                $(this).addClass('transition');
            }, function(){

                $(this).removeClass('transition');
            });
        });
    </script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Update gallery images</h2>
                <br>
                <form action="{{ route('galleries.update', ['id' => $gallery->id]) }}" method="post" class="gallery-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="status">
                                    Status
                                    <span style="color: red">*</span>
                                    <span class="situation">
                                        @if($gallery->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </span>
                                </label>
                                <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" data-url="{{ route('image.update') }}" data-id="{{ $gallery->id }}">
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
                            <div class="col-md-6">
                                <label for="album">Albums
                                    <span style="color: red">*</span>
                                    <span class="parent_albom">
                                        <span class="badge badge-success">{{ $current_album->title }}</span>
                                    </span>
                                </label>
                                <select disabled name="album" id="album" class="form-control {{ $errors->has('album') ? ' is-invalid' : '' }}" data-url="{{ route('image.update') }}" data-id="{{ $gallery->id }}">
                                    <option selected value="0">-- bittasini tanlang --</option>
                                    @foreach($albums as $album)
                                        <option value="{{ $album->id }}">{{ $album->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('album'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('album') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="dropzone">
                            <input style="display: none" type="file" name="files" id="upload" class=" {{ $errors->has('files') ? ' is-invalid' : '' }}"  accept=".jpg, .png, image/jpeg, image/png" multiple>
                        </div>
                        @if ($errors->has('files'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('files') }}</strong>
                            </span>
                        @endif
                    </div>
                </form>
                <div class="container page-top">
                    <div class="row">
                        @foreach($images as $image)
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <button class="delete" data-url="{{ route('image.destroy', ['id' => $image->id]) }}" style="cursor:pointer; float: right;" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt" style="font-size: 25px; color: red; padding-bottom: 10px;"></i></button>
                                <a href="{{ asset('storage') .'/'. $image->path}}"  class="fancybox" rel="ligthbox">
                                    <img  src="{{ asset('storage') .'/'. $image->path}}" class="zoom img-fluid"  alt="{{ $image->name }}" title="{{ $image->name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <form action="" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="background-color: red">
                        <h4 class="modal-title" style="color: #FFFFFF; vertical-align: middle" > Are you sure you want to delete this image?</h4>
                        <button type="button" class="close" data-dismiss="modal" style="vertical-align: middle; margin-top: -20px;">
                            <i class="fa fa-close text-white"></i>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer" style="display: block; text-align: right">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: red; color: white">Yes, Delete this image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $('.delete-form').attr('action', url);
            });

            $('#status').on('change', function (a) {
                a.preventDefault();
                var status_url = $(this).attr('data-url');
                var gallery_id = $(this).attr('data-id');
                var status = $(this).val();
                if (status == 1){
                    status = 'true';
                }else{
                    status = 'false';
                }
                $.ajax({
                    url:status_url,
                    type:'POST',
                    data:{
                        status:status,
                        gallery_id:gallery_id,
                    },
                    success:function (data) {
                        if (data == 'status'){
                            toastr.success("Status has been updated successfully");
                            if (status == 'true'){
                                $('.situation').html('<i class="badge badge-success">Active</i>')
                            }else {
                                $('.situation').html('<i class="badge badge-danger">Deactive</i>')
                            }
                        }
                    }
                });
            });
            $('#album').on('change', function (e) {
                e.preventDefault();
                var album_url = $(this).attr('data-url');
                var gallery_id = $(this).attr('data-id');
                var album_id = $(this).val();
                var text = $('#album option:selected').text();
                // alert(text)
                $.ajax({
                    url:album_url,
                    type:'POST',
                    data:{
                        album_id:album_id,
                        gallery_id:gallery_id,
                    },
                    success:function (data) {
                        if (data == 'album'){
                            toastr.success("Gallery album has been updated successfully");
                            $('.parent_albom').html('<i class="badge badge-success">'+ text +'</i>')
                        }
                    }
                });

            });


            var url =  $('.gallery-form').attr('action');

            var refresh = false;

            $('#status').on('change', function (e) {
                e.preventDefault();
                var status = $(this).val();
                if (status != null){
                    $('#album').attr('disabled', false);
                }
            });
            $('#album').on('change', function (e) {
                e.preventDefault();
                var status = $(this).parent().prev().find('#status').val();
                refresh = true;
                var album_id = $(this).val();
                if ($(this).val() != null){
                    // console.log('album_id: '+ album_id + '; status:' + status);
                    $.ajax({
                        url:url,
                        type: 'POST',
                        data:{
                            status:status,
                            album_id:album_id,
                        },
                        success:function (data) {
                            console.log(data);
                            $('.dropzone').css({'border': 'none', 'opacity':'1', 'backgroundImage':'none'});
                            $('#upload').FancyFileUpload({
                                'params' : {
                                    action : 'fileuploader',
                                    status:status,
                                    album_id:album_id
                                },
                                'dataType':'json',
                                'type':'POST',
                                // send data to this url
                                'url' : url,
                                // key-value pairs to send to the server
                                // editable file name?
                                'edit' : true,
                                // max file size
                                'maxfilesize' : 10000000,
                                // a list of allowed file extensions
                                'accept' : null,
                                // 'iec_windows', 'iec_formal', or 'si' to specify what units to use when displaying file sizes
                                'displayunits' : 'iec_windows',
                                // adjust the final precision when displaying file sizes
                                'adjustprecision' : true,
                                // the number of retries to perform before giving up
                                'retries' : 5,
                                // the base delay, in milliseconds, to apply between retries
                                'retrydelay' : 500,
                                // called for each item after it has been added to the DOM
                                'added' : null,
                                // called whenever starting the upload
                                'startupload' : null,
                                // called whenever progress is up<a href="https://www.jqueryscript.net/time-clock/">date</a>d
                                'continueupload' : null,
                                // called whenever an upload has been cancelled
                                'uploadcancelled' : null,
                                // called whenever an upload has successfully completed
                                'uploadcompleted' : null,

                                // jQuery File Upload options
                                'fileupload': {},

                                // translation strings here
                                'lang<a href="https://www.jqueryscript.net/tags.php?/map/">map</a>': {},
                                // A valid callback function that is called during initialization to allow for last second changes to the settings.
                                // Useful for altering fileupload options on the fly.
                                'preinit' : null,
                            });
                        }
                    });
                }
            });
        })
    </script>
@endsection
