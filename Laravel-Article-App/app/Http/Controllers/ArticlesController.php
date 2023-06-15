<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

  
class ArticlesController extends Controller
{

    public function edit($id)
    {
        $article = Blog::find($id);
        return view('edit-article', compact('article'));
    }

    public function update(Request $req, $id)
    {
        $article = Blog::find($id);
        $article->title = $req->input('title');
        $article->content = $req->input('content');
        $article->update();
        return redirect('view-article')->with('status', "Data updated successfully");
        
    }
   
       public function destroy(Request $req, $id)
    {
        $article = Blog::find($id);
        $article->delete();
        return redirect('view-article')->with('status', "Data deleted successfully");
    }
   

}