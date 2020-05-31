<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\RegisterRequest;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request) {
      $this->validate($request, [
        'full_name' => 'required'
      ]);

      User::create([
        'name' => $request['full_name'],
        'email' => $request['email'],
        'user_type_id' => 1,
        'api_token' => str_random(10),
        'password' => Hash::make($request['password'])
      ]);
      return response()->json(['success' => 'It working']);
    }
}
