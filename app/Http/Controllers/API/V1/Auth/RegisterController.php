<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['string', 'max:255'],
            'username' => ['string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'avatar' => ['image','mimes:jpeg,png,jpg,gif','max:4096'],
        ]);
        $avatarName = "";
        if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {
                $avatarName = 'avatar'.Str::random('10').Carbon::now()->timestamp.'.'.request()->avatar->getClientOriginalExtension();
                $request->avatar->storeAs('images/avatars', $avatarName);
            }
        }
        $user = new User([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName ?? '',
            'username' => $request->username ?? '',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar'=> $avatarName,
            'is_active' => 1,
            'email_verified_token' => Str::random(30),
            'last_active_at' => Carbon::now()->timestamp
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function activate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return $user;
    }

}
