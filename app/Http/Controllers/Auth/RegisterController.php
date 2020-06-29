<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\UserType;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phonenumber' => 'required',
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'phonenumber' => $data['phonenumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type_id' => 1,
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'is_active' => 0
        ]);

        

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user','token'),201);
    }

    public function index()
    {

        return UserResource::collection(User::all());
    }

    public function login(Request $request){
        $credentials = $request->json()->all();

        try{
            if(! $token = JWTAuth::attempt($credentials) ){
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        }catch(JWTException $e){
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            return response()->json(compact('token'));
        }

        public function getAuthenticatedUser(){
            try{
                if(!$user = JWTAuth::parseToken()->authenticate()){
                    return response()->json(['error' => 'user_not_found'],404);
                }
            }catch(Tymon\JWTAuth\Exceptions\TokenExpiredException $e){
                return response()->json(['error' => 'token_expired'], $e->getStatusCode());
            }catch(Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return response()->json(['error' => 'token_invalid'], $e->getStatusCode());
            }catch(Tymon\JWTAuth\Exceptions\JWTException $e){
                return response()->json(['error' => 'token_absent'], $e->getStatusCode());
            }

            return response()->json(compact('user'));
        }
    }