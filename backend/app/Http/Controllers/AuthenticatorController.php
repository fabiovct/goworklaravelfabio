<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

/*

protected function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $request->request->add([
            'grant_type' => 'password',
            'username' => $request->email,
            'password' => $request->password,
            'scope' => $request->scope ? $request->scope : null,
            'client_id' => config('auth.passport.password_client_id'),
            'client_secret' => config('auth.passport.password_client_secret'),
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return \Route::dispatch($proxy);
    }
*/

class AuthenticatorController extends Controller
{
    public function register(Request $request) {
       /* $request->validate([
            'name' => 'required|string',
            'email' => 'require|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);*/
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);


        $user = new User([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'api_token' => str_random(60)
        ]);
        $user->save();

        return response()->json([
            'res'=>'Usuário Criado com sucesso'
        ], 201);
    }

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
