<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use App\City;
use App\State;
class CityController extends Controller
{
    public function index(Request $request){
        
        $cities = City::with(['state','quize'])->paginate(5);

        return view('city.cities')->withCities($cities);
    }

    
    public function show($id)
    {

        $city = city::find($id);
        return view('city.city')->withCity($city);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('city.create')->with([
            'states'  => $states
            
   
           ]);
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


        return redirect('/cities')->with('success', 'City Created!');
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



        return redirect('/cities')->with('success', 'City Updated!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('city.cities')
        ->with('success','City deleted successfully');
    }
}
