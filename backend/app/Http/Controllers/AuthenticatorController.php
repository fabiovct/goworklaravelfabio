<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthenticatorController extends Controller
{

    public function login(Request $request) {

        $login = User::where([
            ['email',$request->email],
            ['password', ($request->password)]
        ])->count();

        if($login === 1){
            session(['session'=>$request->email]);
            return response()->json([
                'res'=>'Logado com sucesso'
            ]);
        } else {
            session()->flush();
            return response()->json([
                'res'=>'email ou password inválidos'
            ]);
        }
    }

    public function logout(Request $request) {
        session()->flush();
        return response()->json([
            'res'=>'Deslogado com sucesso'
        ]);
    }

    public function error() {
        //return response()->json([
            //'status'=>false]);
    //}
    return response(false);
}
}
