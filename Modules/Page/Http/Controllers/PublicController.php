<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
    public function homepage() 
    {
        return view('pages.homepage');
    }

    public function subpage($slug) 
    {
        // $page = 
        return view('pages.subpage', compact('page'));
    }
}
