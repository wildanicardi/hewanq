<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
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

        return response()->json($article);
        
    }
    public function create(Request $request,Article $article)
    {
        $this->validate($request,[
            'title' 	  => 'required|min:5',
    		'value'       => 'required|min:5'
        ]);
        $articles = $article->create([
            'title'      => $request->title,
            'value'     => $request->value,  
            
        ]);
        return $articles;
        
    }

    
}
