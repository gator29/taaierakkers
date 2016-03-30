<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Story;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    public function index() {

        $data = Story::ID()->orderBy('id', 'desc')->get();
        return view('story.index', compact('data'));
    }

    public function show($id){

    $story = Story::findOrFail($id);
    return view('story.show')->withStory($story);
    
	}
}
