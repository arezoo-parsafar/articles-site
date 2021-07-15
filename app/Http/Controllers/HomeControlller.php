<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeControlller extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('index', ['articles' => $articles]);
    }

    public function GetArticle(Request $request)
    {
        $articleId = $request->id;
        $article = Article::find($articleId);
        return view('article', ['article' => $article]);
    }

    public function SaveComment(Request $request)
    {
        Comment::create([
            'text' => $request->input('text'),
            'name' => $request->input('name'),
            'isActive' => false,
            'article_id' => $request->input('id')
        ]);
        return redirect()->route('articles', ['id' => $request->input('id')]);
    }

    public function category(Request $request)
    {
        $articles = Article::where('Category_id', '=', $request->id)->get();
        return view('category', ['articles' => $articles]);
    }

    public function login(Request $request)
    {
        //$inputs = $request->inputs();
      //  return $request->all();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        } else {
            return "نام کاربری یا رمز عبور اشتباه است";
        }
    }

    public function register(Request $request)
    {
        $createdUser = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email
        ]);

        Auth::login($createdUser, false);
        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
