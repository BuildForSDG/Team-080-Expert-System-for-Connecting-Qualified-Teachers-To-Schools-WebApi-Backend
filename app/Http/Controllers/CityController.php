<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use App\City;
class CityController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'state_id' => 'required|integer'
        ]);
        //return CityResource::collection(City::with(['state','quize'])->paginate(5));
        return City::select('id','name')->where('state_id', $request->state_id)->get();
    }

    public function getAllTowns(Request $request)
    {
        return City::where('state_id', $request->state_id)
                ->orderBy('name', 'asc')
                ->paginate($request->per_page);
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

            'towns' => 'required|array|min:1',
            'towns.*.name' => 'required|unique:cities',
            'state_id' => 'required'

        ]);

        foreach ($request->towns as $item) {
            City::create([
                'name' => $item['name'],
                'state_id' => $request['state_id']
            ]);
        }

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
