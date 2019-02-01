<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.welcome')->with('posts', $posts);
    }
    public function getAbout()
    {
        $first = 'Tomek';
        $last = 'Rej';
        $name = $first . ' ' . $last;
        $email = 'tomaszrej@gmail.com';
        $data = [];
        $data['name'] = $name;
        $data['email'] = $email;

        return view('pages.about')->with('data', $data);
    }
    public function getContact()
    {
        return view('pages.contact');
    }
}
