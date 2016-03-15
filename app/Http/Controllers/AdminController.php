<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Img;
use App\News;
use App\Story;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get everything in the tables
        $images  = Img::all();
        $news    = News::all();
        $stories = Story::all();
        $users   = User::all();

        return view('admin');
    }

    public function storeStory(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:stories',
            'story' => 'required',
        ]);

        $request->stories()->create([
            'title' => $request->title,
            'story' => $request->story,
        ]);

        return redirect('/admin');
    }
}
