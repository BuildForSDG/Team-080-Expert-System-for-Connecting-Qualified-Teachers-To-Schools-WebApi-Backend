<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\InstitutionTypeResource;
use App\InstitutionType;
class InstitutionTypeController extends Controller
{
    public function index(){
        return InstitutionTypeResource::collection(InstitutionType::paginate(5));
    }

    public function show($id)
        {
           
            return new InstitutionTypeResource(InstitutionType::find($id));
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
        
       
        $institutiontype = new InstitutionType();
        
        

        $institutiontype->name = $request->get('name');
        
        
       
        
        
        $institutiontype->save();
        
       

        return response()->json(['message'=> 'institution type created', 
        'institutiontype' => $institutiontype]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateInstitutionType  $institutiontype
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'name' => 'required'
            
        ]);
  
        $institutiontype = InstitutionType::find($request->input('id'));
        
        

      
      
        $institutiontype->name = $request->get('name');
       
       
        
        
        $institutiontype->save();
        
       

        return response()->json(['message'=> 'institution type updated', 
        'institutiontype' => $institutiontype]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InstitutionType  $institutiontype
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstitutionType $institutiontype)
    {
        $institutiontype->delete();
  
        return response()->json([
            'message' => 'institution type deleted'
        ]);
    }
}
