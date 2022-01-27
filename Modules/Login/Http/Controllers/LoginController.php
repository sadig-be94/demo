<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return redirect(route('blog.index'));
        }
        return view('login::index');
    }

    public function post(Request $request)
    {
        if (Auth::attempt(['email'=>'admin@gmail.com','password'=>$request->password],true)) {
            return redirect(route('blog.index'));
        }
        return back()->with('error','Şifrə yanlışdır');
    }
    public function logout(){
        Auth::logout();
        return redirect(route('login'))->with('success','Profilinizdən Çıxış Etdiniz.');
    }
}
