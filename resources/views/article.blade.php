@extends('layout')

@section('mainSection')
    <div id="books-items" style="height: 100%">
        <div class="book" style="margin-top: 40px;">

            <h2>
                {{ $article->title }}
            </h2>
            <div>
                <img style="width: 90%;height: 250px;" src="/img/post/{{ $article->picture }}" alt="">
            </div>
            <div>
                {{ $article->text }}
            </div>
            <div>
                <a href="/files/{{ $article->fileAddress }}">دانلود فایل</a>
            </div>
            <div>
                تاریخ انتشار : {{ $article->created_at }}
            </div>
        </div>
        <br>
        <h3 style="text-align: center">سیستم نظرات</h3>
        <div class="book" style="margin-top: 40px;">
            @foreach ($article->comments->where('isActive', true) as $comment)
                <div style="margin-top: 40px;">
                    <div>
                        <label for="">نام :</label>

                        <label> {{ $comment->name }}</label>

                    </div>
                    <div style="margin-bottom: 20px">
                        <label for="">{{ $comment->created_at }}</label>
                    </div>
                    <div>
                        نظر : {{ $comment->text }}
                    </div>
                </div>
            @endforeach

            @guest
                <div>
                    ارسال نظر فقط در صورت ثبت نام کردن امکان پذیر است
                </div>
            @endguest
            @auth
                <div style="margin-top: 50px">
                    <form action="{{ Route('comments') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $article->id }}" name="id">
                        <div>
                            <label for="">نام شما</label>
                            <input type="text" name="name">
                        </div>
                        <div style="margin-top:10px">
                            <label for="">نظر شما</label>
                            <textarea name="text" id="" cols="50" rows="10"></textarea>
                        </div>
                        <div>
                            <input type="submit" value="ثبت">
                        </div>
                    </form>
                </div>
            @endauth

        </div>
    </div>
@endsection
