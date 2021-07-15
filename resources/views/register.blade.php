@extends('layout')

@section('mainSection')
    <div style="display: inline-block;width:700px">
        <div class="title">
            <h1>ثبت نام در کتاب فروشی</h1>
        </div>
        <form action="{{ route('register') }}" method="post" id="register-form">
            @csrf
            <div class="control-box">
                <input id="familyname" type="text" name="name" placeholder="نام خانوادگی" required="">
            </div>

            <div class="control-box">
                <input id="password" type="password" name="password" placeholder="رمز عبور" required="">
            </div>

            <div class="control-box">
                <input id="email" type="Email" name="email" placeholder="پست الکترونیکی" required="">
            </div>

            <div class="control-box">
                <input type="submit" class="form-submit" value="ثبت نام">
            </div>
        </form>

    </div>
@endsection
