<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $password = password_hash("password", PASSWORD_BCRYPT);

        $user = User::where('login', $request->login)->first();
        if(!is_null($user)){
        if(password_verify($request->password,$user->password))
        {
            $user->api_token = Str::random($length = 12);
            $user->save();
            
            return response()->json([
                'token_type' => 'Bearer',
                'token' => $user->api_token,
                'login'=> 'admin',
                'password' => $password
            ], 200);
        }}
        return response()->json([
            'login'=> 'admin',
            'password' => $password
        ], 200);
    }
}
