<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', function (Request $request) {
   if ($request->password==123456789){
       $token=\App\Models\User::first();
       return response()->json(['token'=>$token->password],200);
   }
   return response()->json('şifrə düzgün deyil',401);
});
