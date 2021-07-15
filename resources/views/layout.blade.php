<!DOCTYPE html>
<html>

<head>
	<title>سایت مقالات ایرانیان</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="/css/style.css" />
</head>

<body>


	<div id="top-header">
		<div id="right-header" style="text-align: center;">
			<p>سایت مقالات ایرانیان</p>
		</div>
		<div id="left-header">
			<img src="/images/bookbaner.jpg" style="width: 350px;height: 100px;" />
		</div>
	</div>
	<header>
		<ul id="main-navigation">
			<li style=" background-color:aqua ;height: 30px;"><a href="{{ route('index') }}"> مقالات</a></li>
			@foreach ($categories as $category)
            <li style=" background-color:aqua ;height: 30px;"><a href="{{ route('category',['id'=>$category->id]) }}"> {{ $category->Name }}</a></li>
            @endforeach

            @guest
            <li style=" background-color:aqua;height: 30px; "><a href="{{ route('registerPage') }}">ثبت نام</a></li>
			<li style=" background-color:aqua ;height: 30px;"><a href="{{ route('loginPage') }}">ورود</a></li>
            @endguest
			@auth
            @if(Auth::user()->role=='admin')
            <li style=" background-color:aqua;height: 30px; "><a href="{{ route('checkComments') }}">چک کردن نظرات</a></li>
            <li style=" background-color:aqua;height: 30px; "><a href="{{ route('CreateNewArticle') }}">ایجاد مقاله جدید</a></li>
            <li style=" background-color:aqua;height: 30px; "><a href="{{ route('CreateCategory') }}">ایجاد دسته بندی جدید</a></li>
            <li style=" background-color:aqua;height: 30px; "><a href="{{ route('ArticlesList') }}">لیست مقالات</a></li>


            @endif

            <li style=" background-color:aqua ;height: 30px;"><a href="{{ route('logout') }}">خروج</a></li>
            @endauth
		</ul>
	</header>

	<div id="main-section" class="main-section">
		<div id="content" class="content">
            @yield('mainSection')
		</div>
	</div>



	<div class="footer">
		<div id="right-footer" style="text-align: center;">
			<ul style="margin: auto;">
				<li style="list-style: none;">سایت مقالات ایرانیان</li>

				<li style="list-style: none;">تلفن تماس: ۰۲۱۳۳۳۷۲۴۸۶</li>
			</ul>
		</div>

	</div>


</body>

</html>
