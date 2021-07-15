@extends('layout')

@section('mainSection')
    <table>
        <thead>
            <tr>
                <td>
                    نام مقاله
                </td>
                <td>
                    تاریخ نشر
                </td>
                <td>
                    حذف مقاله
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>
                        {{ $article->title }}
                    </td>
                    <td>
                        {{ $article->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('removeArticle',['id'=> $article->id]) }}">حذف مقاله</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
