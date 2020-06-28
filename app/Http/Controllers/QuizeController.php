<?php

namespace App\Http\Controllers;
use App\Http\Resources\QuizeResource;
use App\Quize;
use Illuminate\Http\Request;

class QuizeController extends Controller
{
    public function index(){
        return QuizeResource::collection(Quize::with(['profile'])->paginate(5));
    }

    public function show($id)
        {
           
            return new QuizeResource(Quize::find($id));
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
        
            'total_questions' => 'required',
            'answers' => 'required',
            'score' => 'required'
            
        ]);
        
       
        $quize = new Quize();
        
        

        $quize->total_questions = $request->get('total_questions');
        $quize->answers = $request->get('answers');
        $quize->score = $request->get('score');
        $quize->is_active = $request->get('is_active');
        $quize->profile_id = $request->get('profile_id');
        
        
        
       
        
        
        $quize->save();
        
       

        return response()->json(['message'=> 'quize created', 
        'quize' => $quize]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateQuize  $quize
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'total_questions' => 'required',
            'answers' => 'required',
            'score' => 'required'
            
        ]);
  
        $quize = Quize::find($request->input('id'));
        
        

        
        $quize->total_questions = $request->get('total_questions');
        $quize->answers = $request->get('answers');
        $quize->score = $request->get('score');
        $quize->is_active = $request->get('is_active');
        $quize->profile_id = $request->get('profile_id');
        
        
        
       
        
        
        $quize->save();
        
       

        return response()->json(['message'=> 'quize updated', 
        'quize' => $quize]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quize $quize)
    {
        $quize->delete();
  
        return response()->json([
            'message' => 'quize deleted'
        ]);
    }
}
