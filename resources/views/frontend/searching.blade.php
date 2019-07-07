@extends('layouts.main')
@section('content')
    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg" style="background: url('{{ asset('sitelogo/section_3.jpg') }}') fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Search result</h1>
                    <p><a href="{{ route('index') }}">Home</a>/Search result</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->
    <!--checkout page start-->
    <div class="checkout-page">
        <div class="container">
            <form action="{{ route('searching') }}">
                <input type="text" class="form-control input-lg" name="search_text" placeholder="Search" value="{{ $q }}">
            </form>
            <br>
            <div class="row">
                <div class="col-md-12 table-responsive">
                    @if(count($posts))
                    <table class="table table-bordered">
                        <thead class="title">
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td><img src="{{ asset('storage') .'/recentPostsThumbnail/'. $post->img}}"  style="min-width: 120px; height: 120px" alt="check out page image"></td>
                                    <td>
                                        <a href="{{ route('blog.details', ['id' => $post->id]) }}" style="font-size: 15px">
                                            {{ str_limit($post->title, 40) }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.details', ['id' => $post->id]) }}" style="font-size: 15px">
                                            {!! str_limit($post->description, 150) !!}
                                        </a>
                                    </td>
                                    <td style="font-size: 15px">
                                        {{ date('d.m.Y / h:i', strtotime($post->sana)) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <table class="table table-bordered">
                            <thead class="title">
                            <tr>
                                <th>Result not found</th>
                            </tr>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--checkout page end-->

    <!--our product end -->

@endsection
