@extends('layout')

@section('mainSection')
<div class="title">
    <h1>معرفی سایت <h1>
</div>
			@foreach ($articles as $article)
            <div id="books-items" style="height: 260px">
                <div class="book" style="margin-top: 40px;">
                    <div class="book-cover">
                        <img src="/img/post/{{ $article->picture }}" style="height: 150px;width: 150px">
                        <a class="buy-it" href="{{ Route('articles',['id'=>$article->id]) }}" style="background-color: yellowgreen">ادامه مقاله</a>
                    </div>
                    <div class="book-body">
                        <a href="{{ Route('articles',['id'=>$article->id]) }}" class="title">{{ $article->title }}</a>
                        <p style="text-align:justify">
                            {{ $article->created_at }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
@endsection
