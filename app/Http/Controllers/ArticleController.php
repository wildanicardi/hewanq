<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderby('id','ASC')->get();
        return view('articles.list',compact('articles'));
    }
    public function form()
    {
        return view('articles.form');
    }
     public function store(Request $request)
    {
        if($request->hasFile('photo')){
            $foto = $request->file('photo');
            $namaFoto = $foto->getClientOriginalName();
            $path = $foto->move(public_path('/images'), $namaFoto);

        }
      	$req = $request->all();

        $result = Article::create($req);

        return redirect('/admin/admin/article');
    }
    public function edit($id)
    {
      $data['data'] = Article::find($id);

      return view('articles.edit', $data);
    }

    public function update($id, Request $request)
    {
      	$req = $request->except('_method', '_token', 'submit');

        $result = Article::where('id', $id)->update($req);

        return redirect('/admin/admin/article');
    }
    public function destroy($id)
    {
      Article::find($id)->delete();

      return redirect('/admin/admin/article');
    }
    //untuk api android
    public function articles(Article $article)
    {
        $article = $article->all();

        return response()->json([
        'article' =>  $article,
        ]);
        
    }
    public function detailArticle($id)
    {
        $article = Article::where('id',$id)->get();
        return response()->json([
           'article' => $article
        ]);
        
    }

    
}
