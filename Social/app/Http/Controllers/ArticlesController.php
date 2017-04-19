<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use DB;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Post::paginate(5);
        //$articles = Post::all();
        //$articles = DB::table('articles')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*$article = new Post;
        $article->user_id=Auth::user()->id;
        $article->content=$request->content;
        $article->live = (boolean)$request->live;
        $article->post_on = $request->post_on;
        $article->save();*/
        Post::create($request->all());
       return redirect('/articles/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article= Post::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles= Post::findOrFail($id);
        return view('articles.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articles = Post::findOrFail($id);

        if (!isset($request->live)) {
            $articles->update(array_merge($request->all(),['live'=>false]));
        }
        else
            $articles->update($request->all());
        return redirect('/articles/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Post::findOrFail($id);
        $articles->delete($id);
        return redirect('/articles/');
    }
}
