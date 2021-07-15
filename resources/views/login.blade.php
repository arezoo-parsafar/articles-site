@extends('layout')

@section('mainSection')
    <div class="title">
        <h1>صفحه ورود</h1>
    </div>
    <form action="{{ route('login') }}" method="post" id="login-form">
        @csrf
        <div class="control-box">
            <input type="text" name="email" placeholder="لطفا ایمیل خود را وارد کنید">
        </div>
        <div class="control-box">
            <input type="password" name="password" placeholder="لطفا رمز عبور خود را وارد کنید">
        </div>
        <div class="control-box">
            <input type="submit" class="form-submit" value="ورود">
        </div>
    </form>
@endsection
