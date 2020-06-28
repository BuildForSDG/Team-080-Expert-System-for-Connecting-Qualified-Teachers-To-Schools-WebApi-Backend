<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProfileResource;
use App\User;
use App\City;
use App\Profile;
use DB;
use Auth;
class ProfileController extends Controller
{
    public function user_profile()
    {
        $profile = User::selectRaw('
            users.email,
            profiles.first_name,
            profiles.last_name
            ')
            ->leftjoin('profiles', 'profiles.user_id', '=', DB::raw('users.id'))
            ->where('users.id', Auth::id())
            ->first();
        return $profile;
    }
    public function index(){
        return ProfileResource::collection(Profile::with(['user','city'])->paginate(5));
    }

    public function show($id)
        {

            return new ProfileResource(profile::find($id));
        }

         /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'firstname' => 'required',
            'lastname' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required'

        ]);


        $profile = new Profile();



        $profile->firstname = $request->get('firstname');
        $profile->lastname = $request->get('lastname');
        $profile->mobile_number = $request->get('mobile_number');
        $profile->address = $request->get('address');
        $profile->gender = $request->get('gender');
        $profile->date_of_birth = $request->get('date_of_birth');
        $profile->user_id = $request->get('user_id');
        $profile->city_id = $request->get('city_id');



        $profile->save();



        return response()->json(['message'=> 'profile created',
        'profile' => $profile]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateProfile  $profile
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([

            'firstname' => 'required',
            'lastname' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required'

        ]);

        $profile = Profile::find($request->input('id'));



        $profile->firstname = $request->get('firstname');
        $profile->lastname = $request->get('lastname');
        $profile->mobile_number = $request->get('mobile_number');
        $profile->address = $request->get('address');
        $profile->gender = $request->get('gender');
        $profile->date_of_birth = $request->get('date_of_birth');
        $profile->user_id = $request->get('user_id');
        $profile->city_id = $request->get('city_id');



        $profile->save();



        return response()->json(['message'=> 'profile updated',
        'profile' => $profile]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response()->json([
            'message' => 'profile deleted'
        ]);
    }
}
