<?php

namespace App\Http\Controllers;
use App\Http\Resources\CountryResource;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        return CountryResource::collection(Country::paginate(5));
    }

    public function getAllCountries(Request $request)
    {
        return Country::orderBy('long_name', 'asc')->paginate($request->per_page);
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

        // 'iso_three' => 'required',
        // 'iso_two' => 'required',
        // 'short_name' => 'required',
        'long_name' => 'required|unique:countries',
        // 'numcode' => 'required',
        // 'un_member' => 'required',
        // 'calling_code' => 'required',
        // 'cctld' => 'required',
        // 'currency_name' => 'required',
        // 'currency_symbol' => 'required'

        ]);


        $country = new Country();



        $country->iso_three = $request->get('iso_three');
        $country->iso_two = $request->get('iso_two');
        $country->short_name = $request->get('short_name');
        $country->long_name = $request->get('long_name');
        $country->numcode = $request->get('numcode');
        $country->un_member = $request->get('un_member');
        $country->calling_code = $request->get('calling_code');
        $country->cctld = $request->get('cctld');
        $country->currency_name = $request->get('currency_name');
        $country->currency_symbol = $request->get('currency_symbol');


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
    public function update(Request $request, $id)
    {
        $request->validate([

            //'iso_three' => 'required',
            //'iso_two' => 'required',
            //'short_name' => 'required',
            'long_name' => 'required|unique:countries,long_name,'.$id,
            //'numcode' => 'required',
            //'un_member' => 'required',
            //'calling_code' => 'required',
            //'cctld' => 'required',
            //'currency_name' => 'required',
            //'currency_symbol' => 'required'

            ]);


        $country = Country::find($id);



        $country->iso_three = $request->get('iso_three');
        $country->iso_two = $request->get('iso_two');
        $country->short_name = $request->get('short_name');
        $country->long_name = $request->get('long_name');
        $country->numcode = $request->get('numcode');
        $country->un_member = $request->get('un_member');
        $country->calling_code = $request->get('calling_code');
        $country->cctld = $request->get('cctld');
        $country->currency_name = $request->get('currency_name');
        $country->currency_symbol = $request->get('currency_symbol');


        $country->update();



        return response()->json(['message'=> 'country created',
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
