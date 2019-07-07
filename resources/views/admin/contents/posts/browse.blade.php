@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30">
            @if($post)
                @can('edit')
                <a href="{{ route('posts.edit', ['id' => $post->id ]) }}">
                    <button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit post</button>
                </a>
                @endcan
                <br>
                <hr>
                <p>status:
                    @if($post->status == 0)
                        <span class="badge badge-danger">Deactive</span>
                    @elseif($post->status == 1)
                        <span class="badge badge-success">Active</span>
                    @endif
                </p>
                <hr>
                <p>seen count:
                        <span class="badge badge-success">{{ $post->seen_count }}</span>
                </p>
                <hr>
                <p> Post author:
                    <span class="badge badge-success">
                        {{ $user->firstname .' '. $user->lastname }}
                    </span>
                </p>
                <hr>
                <p>
                    Post event date:
                    @if($post->event_date)
                        <span class="badge badge-success">
                            {{ $post->event_date }}
                        </span>
                    @else
                        <span class="badge badge-danger">
                            no event
                        </span>
                    @endif
                </p>
                <p>
                    Post created at:
                    <span class="badge badge-info">
                        {{ date('d.m.Y', strtotime($post->created_at)) }}
                    </span>
                </p>
                <div>
                    <span><b>Post image</b></span>
                    <img src="{{ asset('storage') .'/posts/'. $post->img}}" alt="" style="width: 100%">
                </div>
                <hr>
                <p> Post title:
                    <span style="color: grey">
                        {{ $post->title }}
                    </span>
                </p>
                <hr>
                <p style="color: black">Post description:
                    <span style="color: grey">
                        {!! $post->description !!}
                    </span>
                </p>
                <hr>
                <p style="color: black">Post content:
                    <span style="color: grey">
                        {!! $post->content !!}
                    </span>
                </p><hr>
                <span style="color: black">Post url:
                    <h3 style="color: grey">
                        <a href="{!! route('blog.details', ['id' => $post->id]) !!}">{!! route('blog.details', ['id' => $post->id]) !!}</a>
                    </h3>
                </span>
                <hr>
                <br>
                <br>
                <br>
                <br>
            @else
                <p>Siz ushbu postni joriy tilda yaratmagan ekansiz. Iltimos yuqoridan post yaratilgan tilni tanlang va boshqa tillarga tarjima qiling!</p>
            @endif
		</div>
	</div>

@endsection
