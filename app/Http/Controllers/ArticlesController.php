<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
//use Request;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::latest('published_at')->published()->get();

    	return view('articles.index')->with('articles', $articles);
    }

    public function show($id)
    {
    	$article = Article::findOrFail($id);

    	return view('articles.show')->with('article', $article);
    }

    public function create()
    {
    	return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
    	
    	Article::create($request->all());
    	
    	return redirect('articles');
    }

    public function edit($id)
    {
    	$article = Article::findOrFail($id);

    	return view('articles.edit')->with('article', $article);
    }

    public function update($id, ArticleRequest $request)
    {
    	$article = Article::findOrFail($id);

    	$article->update($request->all());

    	return redirect('articles');
    }
}
