<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;

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
    // public function index()
    // {
    //     $stories = Stories::all();

    //     return view('admin', compact('stories'));
    //     // return view('admin')->withStories($stories);
    // }

    // Story functions
    public function index() {

        $data = Story::withTrashed()->ID()->orderBy('id', 'desc')->get();
        return view('admin', compact('data'));
    }

    public function storeStory(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:stories',
            'story' => 'required',
        ]);


        $story = new Story;

        $story->title = $request->get('title');
        $story->story = $request->get('story');

        $story->save();

        Session::flash('flash_message', 'Verhaal succesvol geüpload!');

        return redirect('/admin');
    }

    public function editStory($id){

    $story = Story::findOrFail($id);
    return view('story.edit')->withStory($story);

    }

    public function updateStory($id, Request $request)
    {
        $story = Story::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'story' => 'required'
        ]);

        $input = $request->all();

        $story->fill($input)->save();

        Session::flash('flash_message', 'Verhaal succesvol geüpload!');

        return redirect()->back();
    }

    public function deleteStory($id)
    {
        $story = Story::findOrFail($id);

        $story->delete();

        Session::flash('flash_message', 'Verhaal succesvol verwijderd!');

        return redirect()->route('admin');
    }

    public function restoreStory($id)
    {
        $story = Story::withTrashed()->findOrFail($id);

        $story->restore();

        Session::flash('flash_message', 'Verhaal succesvol hersteld');

        return redirect()->route('admin');
    }


    // News functions
    public function news(){
        $data = News::withTrashed()->ID()->orderBy('id', 'desc')->get();
        return view('news.add', compact('data'));
    }

    public function storeNews(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:news',
            'report' => 'required',
        ]);


        $news = new News;

        $news->title = $request->get('title');
        $news->report = $request->get('report');

        $news->save();

        Session::flash('flash_message', 'Nieuws succesvol geüpload!');

        return redirect('news.add');
    }

    public function editNews($id){

    $news = News::findOrFail($id);
    return view('news.edit')->withNews($news);

    }

    public function updateNews($id, Request $request)
    {
        $news = News::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'report' => 'required'
        ]);

        $input = $request->all();

        $news->fill($input)->save();

        Session::flash('flash_message', 'Nieuws succesvol geüpload!');

        return redirect()->back();
    }

    public function deleteNews($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        Session::flash('flash_message', 'Nieuws succesvol verwijderd!');

        return redirect()->route('news.add');
    }

    public function restoreNews($id)
    {
        $news = News::withTrashed()->findOrFail($id);

        $news->restore();

        Session::flash('flash_message', 'Nieuws succesvol hersteld');

        return redirect()->route('news.add');
    }

    public function img(){
        return view('kcfinder/browse.php?opener=ckeditor&type=images');
    }

}