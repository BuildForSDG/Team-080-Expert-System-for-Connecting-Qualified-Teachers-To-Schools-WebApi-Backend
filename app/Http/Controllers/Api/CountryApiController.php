<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\CountryResource;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryApiController extends Controller
{
    public function index(){
        return CountryResource::collection(Country::paginate(5));
        
    }

    
    public function show($id)
        {

            return new CountryResource(Country::find($id));
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

        
        'long_name' => 'required'
        

        ]);


        $country = new Country();



       
        $country->long_name = $request->get('long_name');
        


        $country->save();



        return response()->json(['message'=> 'country created',
        'country' => $country]);
    }

    public function edit($id)
    {
        return Country::find($id);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateCountry  $country
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([

           
            'long_name' => 'required',
         

            ]);


        $country = Country::find($id);



       
        $country->long_name = $request->get('long_name');
       

        $country->update();



        return response()->json(['message'=> 'country updated',
        'country' => $country]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json([
            'message' => 'country deleted'
        ]);
    }
}
