@extends('layouts.admin')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            @if($album)
                <a href="{{ route('albums.edit', ['id' => $album->id ]) }}">
                    <button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit album</button>
                </a>
                <br>
                <hr>
                <p>status:
                    @if($album->status == 0)
                        <span class="badge badge-danger">Deactive</span>
                    @elseif($album->status == 1)
                        <span class="badge badge-success">Active</span>
                    @endif
                </p>
                <hr>
                <p>seen count:
                    <span class="badge badge-success">{{ $album->seen_count }}</span>
                </p>
                <hr>
                <p> Album author:
                    <span class="badge badge-success">
                        {{ $user->firstname .' '. $user->lastname }}
                    </span>
                </p>
                <hr>
                <div>
                    <span><b>Album image</b></span>
                    <img src="{{ asset('storage') .'/'. $album->filename}}" alt="" style="width: 100%">
                </div>
                <hr>
                <p> Album title:
                    <span style="color: grey">
                        {{ $album->title }}
                    </span>
                </p>
                <hr>
                <p style="color: black">Album description:
                    <span style="color: grey">
                        {!! $album->description !!}
                    </span>
                </p>
                <hr>
            @else
                <p>Siz ushbu postni joriy tilda yaratmagan ekansiz. Iltimos yuqoridan post yaratilgan tilni tanlang va boshqa tillarga tarjima qiling!</p>
            @endif
        </div>
    </div>

@endsection
