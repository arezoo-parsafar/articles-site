@extends('layout')

@section('mainSection')
<div class="title">
    <h1>ایجاد دسته بندی جدید</h1>
</div>
<form action="{{ route('CreateCategoryPost') }}" method="post" id="login-form">
    @csrf
    <div class="control-box">
        <input type="text" name="text" placeholder="نام دسته بندی را وارد کنید">
    </div>
    <div class="control-box">
        <input type="submit" class="form-submit" value="ثبت">
    </div>
</form>
@endsection
