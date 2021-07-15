<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role != 'admin') {
                return redirect('login')->send();
            }
            return $next($request);
        });
    }

    public function changeCommentState()
    {
        $comments = Comment::get();
        return view('changeCommentState', ['comments' => $comments]);
    }

    public function SetNewStateForComment(Request $request)
    {
        $commentId = $request->id;
        $comment = Comment::where('id', $commentId)->first();
        if ($comment->isActive == 1) {
            $comment->update(['isActive' => false]);
        } else {
            $comment->update(['isActive' => true]);
        }
        return redirect()->route('checkComments');
    }

    public function CreateNewArticle()
    {
        $categories = Category::get();
        return view('CreateNewArticle', ['categories' => $categories]);
    }

    public function CreateNewArticlePost(Request $request)
    {
        $image = $request->file('picture');
        $file = $request->file('articleFile');
		
        $url = $image->getClientOriginalName();	
        $image->move('img/post/', $url);

        $fileUrl = $file->getClientOriginalName();
        $file->move('files/', $fileUrl);

        $userId = Auth::user()->id;
        $categoryId = $request->category;

        Article::create([
            'text' => $request->text,
            'title' => $request->title,
            'isActive' => true,
            'picture' => $url,
            'user_id' => $userId,
            'Category_id' => $categoryId,
            'fileAddress' => $fileUrl
        ]);
        return redirect()->route('index');
    }


    public function CreateCategory()
    {
        return view('CreateCategory');
    }

    public function CreateCategoryPost(Request $request)
    {
        Category::create([
            'Name' => $request->text
        ]);
        return redirect()->route('index');
    }

    public function articleList()
    {
        $articles = Article::get();
        return view('articleList', ['articles' => $articles]);
    }

    public function removeArticle(Request $reqeust)
    {
        $article = Article::where('id', $reqeust->id)->first();
        $comments = Comment::where('article_id', $reqeust->id)->get();
        foreach ($comments as $comment)
            $comment->delete();
        $article->delete();
        return redirect()->route('ArticlesList');
    }
}
