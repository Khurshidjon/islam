@extends('layouts.main')
@section('content')

@push('meta')

    <style>
        .is-invalid{
            border-bottom: 1px solid red !important;
        }
        .invalid-feedback{
            color: red;
            font-size: 10px;
            padding-top: 0;
        }
        form input, form textarea{
            margin-bottom: 0 !important;
            margin-top: 30px !important;
            resize: none;
        }
    </style>
@endpush
<script>
    $(function () {
        $(".btn-refresh").on('click', function(){
            $.ajax({
                type:'GET',
                url:'{{ route('refresh_captcha') }}',
                success:function(data){
                    $(".captcha span").html(data);
                }
            });
        });
    });
</script>
    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg" style="background: url('{{ asset('sitelogo/section_3.jpg') }}') fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>@lang('pages.contact')</h1>
                    <p><a href="{{ route('index') }}">@lang('pages.home')</a>/ @lang('pages.contact_us')</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->

    <div class="map">
        <iframe src="https://yandex.uz/map-widget/v1/-/CCe1mHp5" width="560" height="400" frameborder="1" allowfullscreen="true"></iframe>
    </div>

    <!-- contact info start-->

    <div class="contact-info">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 col-sm-4">
                    <div class="single-contact-box">
                        <div class="contact-icon">
                            <i class="icofont icofont-location-pin"></i>
                        </div>
                        <h4>@lang('pages.our_address')</h4>
                        <p>{{ $address!=null?$address->val:'' }}</p>
                        <a href="#">@lang('pages.directions')</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="single-contact-box">
                        <div class="contact-icon">
                            <i class="icofont icofont-phone"></i>
                        </div>
                        <h4>@lang('pages.phone_number')</h4>
                        <p>{{ $phone!=null?$phone->val:'' }}</p>
                        <a href="#">@lang('pages.call_us')</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="single-contact-box">
                        <div class="contact-icon">
                            <i class="icofont icofont-email"></i>
                        </div>
                        <h4>@lang('pages.our_email')</h4>
                        <p>{{ $email!=null?$email->val:'' }}</p>
                        <a href="#">@lang('pages.send_a_message')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact info end-->

    <div class="contact-form">
        <!--contact form start-->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h2>@lang('pages.write_letter')</h2>
                        <span class="title-separetor">
                            <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
                        </span>
                    </div>
                    <form action="{{ route('send.message') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="firstname" name="firstname" class="{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="@lang('pages.firstname')">
                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                                <input type="email" id="email" name="email" class=" {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="@lang('pages.email')">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="lastname" name="lastname" class=" {{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="@lang('pages.lastname')">
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                                <input type="tel" id="phone" name="phone" class=" {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="@lang('pages.phone')">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <textarea name="message" id="message" cols="30" rows="10" class=" {{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="@lang('pages.message')"></textarea>
                            @if ($errors->has('message'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="captcha">
                                    <span>{!! captcha_img('flat') !!}</span>
                                    <button type="button" class="btn btn-success btn-refresh"><i class="glyphicon glyphicon-refresh"></i></button>
                                </div>
                                <input id="captcha" type="text" class="form-control {{ $errors->has('captcha') ? 'is-invalid' : '' }}" placeholder="Enter Captcha" name="captcha">

                                @if ($errors->has('captcha'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="submit" value="@lang('pages.message_send_button')">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--contact form end-->
@endsection
