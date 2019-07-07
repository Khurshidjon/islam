@extends('layouts.admin')
@section('content')

<div class="main-content bg-white border-left">
    <div class="section__content section__content--p30">
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>URL</th>
                        <th>Page name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><b class="text-success">https://</b>{{Request::getHttpHost()}}/news</td>
                        <td>Yangiliklar</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><b class="text-success">https://</b>{{Request::getHttpHost()}}/blog-details/<b class="text-danger">POST_ID</b></td>
                        <td>Sahifa yoki Batafsil ko'rish</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><b class="text-success">https://</b>{{Request::getHttpHost()}}/albums</td>
                        <td>Albomlar</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><b class="text-success">https://</b>{{Request::getHttpHost()}}/albums/<b class="text-danger">ALBUM_ID</b></td>
                        <td>Galleriyani batafsil ko'rish</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><b class="text-success">https://</b>{{Request::getHttpHost()}}/news-by-category/<b class="text-danger">POST_ID</b> </td>
                        <td>Kategoriya bo'yicha yangiliklar</td>
                    </tr>
                </tbody>
            </table>
            <div class="my-5"></div>
            <b>Bu yerda <span class="text-danger">POST_ID</span> postning bazadagi tartib raqami (<a href="{{ route('posts.index') }}" target="_blank">bu yerga o'tib</a>) sahifa yuqorsidagi site manzilidan bilib olishingiz mumkin</b>
            <br>
            <br>

            <b>Bu yerda <span class="text-danger">ALBUM_ID</span> albomning bazadagi tartib raqami (<a href="{{ route('albums.index') }}" target="_blank">bu yerga o'tib</a>) sahifa yuqorsidagi site manzilidan bilib olishingiz mumkin</b>
        </div>
    </div>
</div>

@endsection