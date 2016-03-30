<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
	public function index() {

        $data = News::ID()->orderBy('id', 'desc')->get();
        return view('news.index', compact('data'));
    }

    public function show($id){

    $news = News::findOrFail($id);
    return view('news.show')->withNews($news);
    
	}
}
