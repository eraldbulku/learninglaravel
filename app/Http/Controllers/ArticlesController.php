<?php

namespace App\Http\Controllers;


use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
//use Request;
use Carbon\Carbon;
use Session;

class ArticlesController extends Controller
{

	public function __construct()
	{
		//$this->middleware('auth', ['except'=>'create']);
	}

    public function index()
    {
    	$articles = Article::latest('published_at')->published()->get();
        $latest = Article::latest()->first();

    	return view('articles.index')->with(['articles' => $articles, 'latest' => $latest]);
    }

    public function show($id)
    {
    	$article = Article::findOrFail($id);

    	return view('articles.show')->with('article', $article);
    }

    public function create()
    {
    	$tagsName = [];
        $tags = Tag::all('name');
        foreach ($tags as $tag) {
            array_push($tagsName, $tag['name']);
        }

        return view('articles.create')->with('tags', $tagsName);
    }

    public function store(ArticleRequest $request)
    {
    	//$this->validate($request, ['title'=> 'required']);
        //dd($request->input('tags'));

    	$article = Article::create($request->all());

        $tagId = $request->input('tag_list');
        $article->tags()->attach($tagId);
    	
        session()->flash('flash_message', 'Your article has been created');

    	return redirect('articles');
    }

    public function edit($id)
    {
    	$article = Article::findOrFail($id);

        $tagsName = [];
        $tags = Tag::all('name');
        foreach ($tags as $tag) {
            array_push($tagsName, $tag['name']);
        }

    	return view('articles.edit')->with(['article' => $article, 'tags' => $tagsName]);
    }

    public function update($id, ArticleRequest $request)
    {
    	$article = Article::findOrFail($id);

        $tagId = $request->input('tag_list');
        $article->tags()->sync($tagId);

        $article->update($request->all());

    	return redirect('articles');
    }
}
