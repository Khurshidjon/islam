@extends('layouts.admin')
@section('content')
    <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <h2>Sort Homepage News</h2>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <form action="" class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Latest events: </span>
                            </div>
                            <select name="post1" id="post1" class="form-control" data-url="{{ route('post.1') }}">
                                <option value="" selected disabled>--select once--</option>
                                @foreach($galleries as $gallery)
                                    <option value="{{ $gallery->id }}" {{ $c_id1->val==$gallery->id ? 'selected':'' }}>{{ $gallery->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <form action="" class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Our causes: </span>
                            </div>
                            <select name="post2" id="post2" class="form-control" data-url="{{ route('post.2') }}">
                                <option value="" selected disabled>--select once--</option>
                                @foreach($galleries as $gallery)
                                    <option value="{{ $gallery->id }}" {{ $c_id2->val==$gallery->id ? 'selected':'' }}>{{ $gallery->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <form action="" class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Latest news: </span>
                            </div>
                            <select name="post3" id="post3" class="form-control" data-url="{{ route('post.3') }}">
                                <option value="" selected disabled>--select once--</option>
                                @foreach($galleries as $gallery)
                                    <option value="{{ $gallery->id }}" {{ $c_id3->val==$gallery->id ? 'selected':'' }}>{{ $gallery->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
