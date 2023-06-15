<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class AddController extends Controller
{
    function addData(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $article = new Blog;
        $article->title = $req->title;
        $article->content = $req->content;
        $article->save();

        return redirect()->route('view-article', [$article]);
    }
}