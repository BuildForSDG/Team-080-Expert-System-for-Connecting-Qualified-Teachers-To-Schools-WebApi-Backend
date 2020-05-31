<?php

namespace App\Http\Controllers;
use App\Http\Resources\InstitutionResource;
use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index(){
        return InstitutionResource::collection(Institution::with([' state','institutiontype'])->paginate(5));
    }

    public function show($id)
        {
           
            return new InstitutionResource(Institution::find($id));
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
            
        ]);
        
       
        $institution = new Institution();
        
        

        $institution->name = $request->get('name');
        $institution->state_id = $request->get('state_id');
        $institution->institution_type_id = $request->get('institution_type_id');
        
       
        
        
        $institution->save();
        
       

        return response()->json(['message'=> 'institution created', 
        'institution' => $institution]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateInstitution  $institution
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'name' => 'required'
            
        ]);
  
        $institution= Institution::find($request->input('id'));
        
        

      
      
        $institution->name = $request->get('name');
        $institution->state_id = $request->get('state_id');
        $institution->institution_type_id = $request->get('institution_type_id');
        
       
        
        
        $institution->save();
        
       

        return response()->json(['message'=> 'institution updated', 
        'institution' => $institution]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();
  
        return response()->json([
            'message' => 'institution deleted'
        ]);
    }
}
