<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\SubjectResource;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SubjectApiController extends Controller
{
    public function index(){
        return SubjectResource::collection(Subject::with(['level'])->paginate(5));
    }

    public function show($id)
        {
           
            return new SubjectResource(Subject::find($id));
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
        
       
        $subject = new Subject();
        
        

        $subject->name = $request->get('name');
        $subject->level_id = $request->get('level_id');
        
        
        
       
        
        
        $subject->save();
        
       

        return response()->json(['message'=> 'subject created', 
        'subject' => $subject]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateSubject  $subject
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'name' => 'required'
            
        ]);
  
        $subject = Subject::find($request->input('id'));
        
        

       
        $subject->name = $request->get('name');
        $subject->level_id = $request->get('level_id');
        
        
        
       
        
        
        $subject->save();
        
       

        return response()->json(['message'=> 'subject updated', 
        'subject' => $subject]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
  
        return response()->json([
            'message' => 'subject deleted'
        ]);
    }
}
