<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if($validate->fails()){
            return response([
                'status' => false,
                'message' => 'Not valid admin',
                'data' => []
            ]);
        }

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return response([
                'status' => false,
                'message' => 'Something went wrongs',
                'data' => []
            ]);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Staff Token');
        $token = $tokenResult->token;
        $token->save();

        return response([
            'status' => true,
            'message' => 'Success',
            'data' => [
                'access_token' => $tokenResult->accessToken,
                'user' => [
                    'email' => $user->email,
                    'name' => $user->name
                ]
            ]
        ]);
    }

    public function loginPost(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }

        return redirect()->route('welcome');
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response([
            'status' => true,
            'message' => 'Çıkış yapıldı',
            'data' => []
        ]);
    }

    public function logoutPost(Request $request)
    {
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }

    public function user(Request $request)
    {
        return response([
            'status' => true,
            'message' => '',
            'data' => $request->user()
        ]);
    }
}
