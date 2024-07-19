<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Welcome to Laravel';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function signin(Request $request)
    {
        $request->validate([
            "email"=> "required|email",
            "password"=> "required",
        ]);
        $user=User::where("email", $request->email)->first();
        if(!$user||!Hash::check($request->password,$user->password))
        {
            return response([
                'massage'=>'Bad login details'
            ],401);
        }
        $token=$user->createToken("auth_token")->plainTextToken;
        $response=[
            "user"=> $user,
            "token"=> $token,
        ];
        return response($response,201);
    }
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|max:255",
            "username"=>"required|string|max:255",
            "email"=> "required|unique:users,email|max:255|email",
            "password"=> "required|string|confirmed|min:6|max:255",
        ]);
        $user=User::create([
            "name"=> $request->name,
            "username"=> $request->username,
            "email"=> $request->email,
            "password"=> $request->password,
        ]);
        $token=$user->createToken("auth_token")->plainTextToken;
        $response=[
            "user"=> $user,
            "token"=> $token,
        ];
        return response($response,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            "message"=> "Logged out",
            "status"=>201
        ];
    }
}
