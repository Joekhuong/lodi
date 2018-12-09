<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idol;
use App\Page;

class PagesController extends Controller
{
    public function index($page_key = null)
    {   
        $page = Page::where(['key' => $page_key])->with('idol')->firstOrFail();
        
        return view('page',['page' => $page]);
    }

}
