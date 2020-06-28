<?php

namespace App\Http\Controllers;
use App\Http\Resources\DegreeResource;
use App\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function index(){
        return DegreeResource::collection(Degree::paginate(5));
    }

    public function show($id)
        {
           
            return new DegreeResource(Degree::find($id));
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
        
            'name' => 'required',
            'code' => 'required'
            
        ]);
        
       
        $degree = new Degree();
        
        

        $degree->name = $request->get('name');
        $degree->iso_two = $request->get('code');
       
        
        
        $degree->save();
        
       

        return response()->json(['message'=> 'degree created', 
        'degree' => $degree]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateDegree  $degree
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'name' => 'required',
            'code' => 'required'
            
        ]);
  
        $degree= Degree::find($request->input('id'));
        
        

      
        $degree->name = $request->get('name');
        $degree->iso_two = $request->get('code');
       
        
        
        $degree->save();
        
       

        return response()->json(['message'=> 'degree updated', 
        'degree' => $degree]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Degree $degree)
    {
        $degree->delete();
  
        return response()->json([
            'message' => 'degree deleted'
        ]);
    }
}
