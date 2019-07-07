@extends('layouts.admin')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            @if($setting)
                <a href="{{ route('settings.edit', ['id' => $setting->id ]) }}">
                    <button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit settings</button>
                </a>
                <br>
                <hr>
                <div>
                    <span><b>Settings image</b></span>
                    <img src="{{ asset('storage') .'/'. $setting->img}}" alt="" style="width: 100%">
                </div>
                <hr>
                <p> Setting key:
                    <span style="color: grey">
                        {{ $setting->key }}
                    </span>
                </p>
                <hr>
                <p> Setting url:
                    <span style="color: grey">
                        {{ $setting->url }}
                    </span>
                </p>
                <hr>
                <p> Setting value:
                    <span style="color: grey">
                        {{ $setting->val }}
                    </span>
                </p>
                <hr>
            @else
                <p>Siz ushbu postni joriy tilda yaratmagan ekansiz. Iltimos yuqoridan post yaratilgan tilni tanlang va boshqa tillarga tarjima qiling!</p>
            @endif
        </div>
    </div>

@endsection
