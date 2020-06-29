<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use App\Http\Controllers\Controller;
use App\City;
class CityApiController extends Controller
{
    public function index(Request $request){
        
        return CityResource::collection(City::with(['state'])->paginate(5));
        
    }

    
    public function show($id)
    {

        return new CityResource(city::find($id));
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

            'name' => 'required'

        ]);

       
        $city = new City();



        $city->name = $request->get('name');
        $city->state_id = $request->get('state_id');




        $city->save();


        return response()->json(['message'=> 'city created']);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateCity  $city
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([

            'name' => 'required'

        ]);


        $city = City::find($request->input('id'));



        $city->name = $request->get('name');
        $city->state_id = $request->get('state_id');




        $city->save();



        return response()->json(['message'=> 'city updated',
        'city' => $city]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->json([
            'message' => 'city deleted'
        ]);
    }
}
