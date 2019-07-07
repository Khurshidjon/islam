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
</style>

<script>
    $(function () {
        $('#status').select2();
        $('#album').select2();
    });
</script>

<div class="main-content bg-white border-left">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <h2>Add gallery images</h2>
            <br>
            <form action="{{ route('galleries.store') }}" method="post" class="gallery-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <label for="album">Albums <span style="color: red">*</span></label>
                            <select disabled name="album" id="album" class="form-control {{ $errors->has('album') ? ' is-invalid' : '' }}">
                                    <option selected disabled>-- bittasini tanlang --</option>
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
                        <input style="display: none" type="file" name="files" id="demo" class=" {{ $errors->has('files') ? ' is-invalid' : '' }}"  accept=".jpg, .png, image/jpeg, image/png" multiple>
                    </div>
                    @if ($errors->has('files'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('files') }}</strong>
                        </span>
                    @endif
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
                console.log('album_id: '+ album_id + '; status:' + status);
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
                        $('#demo').FancyFileUpload({
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
