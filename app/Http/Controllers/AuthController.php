<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Listing;
use Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'type' => 'required|max:1',
            'token' => 'required|min:32'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => $request->type,
            'token' => AuthController::getToken()
        ]);

        return response()->json($user);
    }

    protected function getToken(){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
    
        for ($i=0; $i < 32; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){ //if login success


            $status = array(
                'code' => '200',
                'message' => 'Access Granted'
            );

            $user=Auth::user();

            $data = array(
                'id' => $user->id,
                'token' => $user->token,
                'status' => $status,
            );

            return response()->json($data);
            // $token=$user->createToken($user->email.'-'.now());

            // return response()->json([
            //     'token'=>$token->accessToken
            // ]);
        }
    }

    public function listing(Request $request)
    {

        $listings = User::find($request->id)->listings;


        $list = array();
        foreach($listings as $listing)
        {
            $list[] = $listing;
        }

        $status = array(
            'code' => '200',
            'message' => 'Listing successfully retrieved'
        );

        $data = array(
            'list' => $list,
            'status' => $status
        );

        return response()->json($data);

    }

    
}
