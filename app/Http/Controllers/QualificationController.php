<?php

namespace App\Http\Controllers;
use App\Http\Resources\QualificationResource;
use App\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function index(){
        return QualificationResource::collection(Qualification::with(['profile','institution','degree'])->paginate(5));
    }

    public function show($id)
        {
           
            return new QualificationResource(Qualification::find($id));
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
            'start_date' => 'required',
            'end_date' => 'required',
            'cert_image' => 'required|mimes:jpeg,png,bmp,tiff |max:4096'
            
        ]);
        
       
        $qualification = new Qualification();
        
        if($request->has('cert_image')) {
            $image = $request->file('cert_image');
              
             $filename = $image->getClientOriginalName();
             $image->move(public_path('images/certificate'), $filename);
             $qualification->cert_image = $request->file('cert_image')->getClientOriginalName();
         }


        $qualification->name = $request->get('name');
        $qualification->start_date = $request->get('start_date');
        $qualification->end_date = $request->get('end_date');
        $qualification->profile_id = $request->get('profile_id');
        $qualification->institution_id = $request->get('institution_id');
        $qualification->degree_id = $request->get('degree_id');
        
        
       
        
        
        $qualification->save();
        
       

        return response()->json(['message'=> 'qualification created', 
        'qualification' => $qualification]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateQualification  $qualification
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cert_image' => 'required|mimes:jpeg,png,bmp,tiff |max:4096'
            
        ]);
  
        $qualification = Qualification::find($request->input('id'));
        
        

        if($request->has('cert_image')) {
            $image = $request->file('cert_image');
              
             $filename = $image->getClientOriginalName();
             $image->move(public_path('images/certificate'), $filename);
             $qualification->cert_image = $request->file('cert_image')->getClientOriginalName();
         }


        $qualification->name = $request->get('name');
        $qualification->start_date = $request->get('start_date');
        $qualification->end_date = $request->get('end_date');
        $qualification->profile_id = $request->get('profile_id');
        $qualification->institution_id = $request->get('institution_id');
        $qualification->degree_id = $request->get('degree_id');
        
        
       
        
        
        $qualification->save();
        
       

        return response()->json(['message'=> 'qualification updated', 
        'qualification' => $qualification]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        $qualification->delete();
  
        return response()->json([
            'message' => 'qualification deleted'
        ]);
    }
}
