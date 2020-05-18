<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthenticatorController extends Controller
{

    /*public function login(Request $request) {

        $login = User::where([
            ['email',$request->email],
            ['password', $request->password]
        ])->count();

        if($login === 1){
            session(['session'=>$request->email]);
            $v = session()->get('session');
            //return response($v);
           return response()->json([
                'res'=>'Logado com sucesso',
                'status'=>'true',
                'session'=> $v
            ]);
        } else {
            session()->flush();
            return response()->json([
                'res'=>'email ou password inválidos',
                'status'=>'false'
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
        $v = session()->all();
        //return response()->json([
            //'status'=>false]);
    //}
    return response($v);
}*/
public function login(Request $request) {
    $validator = Validator::make($request->all(),[
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 401);
    }


    $validators = [
        'email'=> $request->email,
        'password'=> $request->password
    ];

    if(!Auth::attempt($validators))
    return response()->json([
        'error' => 'Acesso negado'
    ], 401);

    $user = $request->user();
    $token = $user->createToken('Token de acesso')->accessToken;

    return response()->json([
        'token'=>$token
    ], 200);

}

public function logout(Request $request) {
    $request->user()->token()->delete();
    return response()->json([
        'res'=>'Deslogado com sucesso'
    ]);
}

public function error() {
    return response()->json([
        'token'=>false]);
}


}
