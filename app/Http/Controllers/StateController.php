<?php

namespace App\Http\Controllers;
use App\Http\Resources\StateResource;
use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'country_id' => 'required|integer'
        ]);

        // return StateResource::collection(State::with(['country'])->paginate(5));
        return State::select('id','name')->where('country_id', $request->country_id)->get();
    }

    public function getStates(Request $request)
    {
        return State::where('country_id', $request->country_id)
                ->orderBy('name', 'asc')
                ->paginate($request->per_page);
    }

    public function show($id)
    {

        return new StateResource(State::find($id));
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

            'states' => 'required|array|min:1',
            'states.*.name' => 'required|unique:states',
            'country_id' => 'required|integer'

        ]);

        foreach ($request->states as $data) {
            State::create([
                'name' => $data['name'],
                'country_id' => $request->get('country_id')
            ]);
        }

        return response()->json(['message'=> 'state created']);
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



        return response()->json(['message'=> 'state updated',
        'state' => $state]);
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

        return response()->json([
            'message' => 'state deleted'
        ]);
    }
}
