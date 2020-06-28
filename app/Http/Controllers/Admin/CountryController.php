<?php

namespace App\Http\Controllers\Admin;
use App\Http\Resources\CountryResource;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::paginate(5);
        return view('country.countries')->withCountries($countries);
        
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }
  
    public function show($id)
        {

            $country = Country::find($id);
            return view('country.country')->withCountry($country);
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



        return redirect('/countries')->with('success', 'Country Created!');
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



        return redirect('/countries')->with('success', 'Country Updated!');
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

        return redirect()->route('country.countries')
        ->with('success','Country deleted successfully');
    }
}
