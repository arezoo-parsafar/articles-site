@extends('layout')

@section('mainSection')
    <table>
        <thead>
            <tr>
                <td>
                    نام وارد کننده
                </td>
                <td>
                    متن نظر
                </td>
                <td>
                    تاریخ
                </td>
                <td>
                    وضعیت فعلی کامنت
                </td>
                <td>
                    تغییر وضعیت کامنت
                </td>
            </tr>
        </thead>


        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>
                        {{ $comment->name }}
                    </td>
                    <td>
                        {{ $comment->text }}
                    </td>
                    <td>
                        {{ $comment->created_at }}
                    </td>
                    <td>
                        @if ($comment->isActive == true)
                            فعال
                        @else
                            غیر فعال
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('SetNewStateForComments', ['id' => $comment->id]) }}" style="background-color: green">تغییر وضعیت</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
