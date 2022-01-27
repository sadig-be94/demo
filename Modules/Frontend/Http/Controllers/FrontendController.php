<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Blog;

class FrontendController extends Controller
{

    public function index()
    {
        $data=Blog::orderBy('id')->paginate(6);
        return view('frontend::index',compact('data'));
    }

    public function blog($slug){
        $data=Blog::where('slug',$slug)->first();
        $blog=Blog::where('id','!=',$data->id)->orderByDesc('id')->limit(3)->get();
        return view('frontend::blog',compact('data','blog'));
    }

}
