<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function register(Request $request)
	{
		$user = User::create(
			[
				'family' => $request['family'],
				'name' => $request['name'],
				'surname' => $request['surname'],
				'gender' => $request['gender'],
				'age' => $request['age'],
				'country' => $request['country'],
				'city' => $request['city'],
				'about' => $request['about'],
				'phone' => $request['phone'],
				'email' => $request['email'],
				'password' => Hash::make($request['password']),
			]
		);
		$accessToken = $user->createToken('authToken')->accessToken;
		return response(['user' => $user, 'access_token' => $accessToken]);
	}

	public function login(Request $request)
	{
		$login = $request->validate([
			'email' => 'required|string',
			'password' => 'required|string'
		]);

		if (!Auth::attempt($login)) {
			return response(['message' => 'Неверный логин или пароль']);
		}

		$accessToken = Auth::user()->createToken('authToken')->accessToken;

		return response(['user' => Auth::user(), 'access_token' => $accessToken]);
	}
}
