<?php

namespace App\Http\Controllers;
use App\Http\Resources\QuestionResource;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        return QuestionResource::collection(Question::with(['subject'])->paginate(5));
    }

    public function show($id)
        {
           
            return new QuestionResource(Question::find($id));
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
        
            'question' => 'required',
            'image_name' => 'required',
        
            
        ]);
        
       
        $question = new Question();
        
        if($request->has('image_name')) {
            $image = $request->file('image_name');
              
             $filename = $image->getClientOriginalName();
             $image->move(public_path('images/certificate'), $filename);
             $question->image_name = $request->file('image_name')->getClientOriginalName();
         }


        $question->name = $request->get('name');
        $question->is_active = $request->get('is_active');
        $question->is_german = $request->get('is_german');
        $question->subject_id = $request->get('subject_id');
        
        
        
        
       
        
        
        $question->save();
        
       

        return response()->json(['message'=> 'question created', 
        'question' => $question]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateQuestion $question
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'question' => 'required',
            'image_name' => 'required',
        
            
        ]);
        $question = Question::find($request->input('id'));
        
        

        if($request->has('image_name')) {
            $image = $request->file('image_name');
              
             $filename = $image->getClientOriginalName();
             $image->move(public_path('images/certificate'), $filename);
             $question->image_name = $request->file('image_name')->getClientOriginalName();
         }


        $question->name = $request->get('name');
        $question->is_active = $request->get('is_active');
        $question->is_german = $request->get('is_german');
        
        
        
       
        
        
        $question->save();
        
       

        return response()->json(['message'=> 'question updated', 
        'question' => $question]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
  
        return response()->json([
            'message' => 'question deleted'
        ]);
    }
}
