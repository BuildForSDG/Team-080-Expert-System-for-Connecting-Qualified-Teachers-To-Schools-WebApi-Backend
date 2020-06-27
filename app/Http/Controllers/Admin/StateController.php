<?php

namespace App\Http\Controllers;
use App\Http\Resources\StateResource;
use App\State;
use App\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request){
        

        $states = State::with(['country'])->paginate(5);

        return view('state.states')->withStates($states);
       
    }

   

    public function show($id)
    {

    $state = State::find($id);

    return view('state.state')->withState($state);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('state.create')->with([
            'countries'  => $countries
            
   
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

        $state = new State();




        $state->name = $request->get('name');
        $state->country_id = $request->get('country_id');






        $state->save();

        return redirect('/states')->with('success', 'State Created!');
    }

    public function edit($id)
    {
        return State::find($id);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateState  $state
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([

            'name' => 'required'

        ]);

        $state = State::find($request->input('id'));




        $state->name = $request->get('name');
        $state->country_id = $request->get('country_id');






        $state->save();



        return redirect('/states')->with('success', 'State Updated!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('state.states')
        ->with('success','State deleted successfully');
    }
}
