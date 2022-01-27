<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Http\Requests\BlogRequest;
use Modules\Blog\Http\Requests\EditBlogRequest;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()){
            $key=$request->key;
            $data=Blog::where('title','LIKE', "%{$key}%")->limit(10)->get();
            $view=view('blog::component.blogList',compact('data'))->render();
            return response()->json(["html"=>$view]);
        }
        $data=Blog::orderByDesc('id')->get();
        return view('blog::index',compact('data'));
    }


    public function create()
    {
        return view('blog::create');
    }


    public function store(BlogRequest $request)
    {
        $request->flash();
        $image=str_replace(['public', 'http:'], ['storage', App::environment() == 'production' ? 'https:' : 'http:'], asset($request->file('image')->store('public/blog')));
        $table= new Blog();
        $table->title=$request->title;
        $table->content=$request->text;
        $table->created_at=$request->date.' '.$request->hour;
        $table->img=$image;
        $table->slug=Str::slug($request->title.'-'.$table->id);
        $table->save();
        return redirect(route('blog.index'))->with('success','Məlumat əlavə edildi');
    }

    public function show($id)
    {
        return view('blog::show');
    }


    public function edit($id)
    {
        $data=Blog::where('id',$id)->first();
        return view('blog::edit',compact('data'));
    }


    public function update(EditBlogRequest $request, $id)
    {      $table=Blog::find($id);
        if ($request->hasFile('image')){
            $image=str_replace(['public', 'http:'], ['storage', App::environment() == 'production' ? 'https:' : 'http:'], asset($request->file('image')->store('public/blog')));
            $table->img=$image;
        }
        $table->title=$request->title;
        $table->content=$request->text;
        $table->slug=Str::slug($request->title);
        $table->save();
        return redirect(route('blog.index'))->with('success','Məlumat dəyişdirildi');
    }


    public function destroy($id)
    {
        Blog::where('id',$id)->delete();
        return "Məlumat silindi";
    }
    public function apiCreate(Request $request): \Illuminate\Http\JsonResponse
    {
        $key=User::first();
        if ($request->header('token')==$key->password){
            $validation = Validator::make($request->all(),[
                'image' => 'required',
                'title'=>'required',
                'text'=>'required',
                'date'=>'required'
            ]);
            if($validation->fails()){
                return response()->json($validation->messages(),400);
            }
            $table= new Blog();
            $table->title=$request->title;
            $table->content=$request->text;
            $table->created_at=$request->date;
            $table->img=$request->image;
            $table->slug=Str::slug($request->title);
            $table->save();
            return response()->json('Məlumat əlavə edildi',200);
        }
        return response()->json('Token düzgün deyil',400);
    }
}
