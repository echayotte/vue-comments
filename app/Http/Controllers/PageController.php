<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function accueil()
    {
        return view('welcome', [
            'title' => 'Accueil'
        ]);
    }

    public function page1()
    {
        return view('welcome', [
            'title' => 'Commentaires sur Page 1'
        ]);
    }

    public function page2()
    {
        return view('welcome', [
            'title' => 'Commentaires sur Page 2'
        ]);
    }
}
