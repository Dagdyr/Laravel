<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addArticle(Request $request){
        $title = $request->title; // Читаем из input name="title"
        $content = $request->contentField; // Читаем из textare name="contentField"
        $article = new \App\Models\Article(); // Модель Article
        $article->title = $title; // Значение столбца title
        $article->content = $content; // Значение столбца content
        $article->author_id = 1; // Значение столбца author_id
        $article->save(); // Сохраняем в БД
        return redirect()->intended('/addArticle');
    }
    public function showArticleById(Request $request){
        $articleId = $request->id;
        $article = Comments::where('id', $articleId)->first();
        return view('pages.article', ['article'=>$article]);
    }

    public function addComment(Request $request){
        $author_id = $request->author_id;
        $article_id = $request->article_id;
        $content = $request->content;
        $comment = new \App\Models\Comments();
        $comment->content = $content;
        $comment->author_id = $author_id;
        $comment->article_id = $article_id;
        $comment->save();
        return redirect('/article/'.$article_id);
    }

    public function getCommentByArticleId(){
        $article_id = 1;
        $comments = DB::table('comments')->where('article_id', $article_id)->first();
        $content = $comments->content;
        $author_id = $comments->author_id;
        $comments  = [$author_id, $content];
        return view('article', compact($comments));
        /*return json_encode($comment);*/


    }



}
