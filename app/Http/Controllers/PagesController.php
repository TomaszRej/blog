<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('pages.welcome');
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
