<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
class AnswerController extends Controller
{
    public function index(){
        $answers = Answer::with(['question'])->paginate(5);
        return view('answer.answers')->withAnswers($answers);
    }

    public function show($id)
        {
           
            $answer = Answer::find($id);
            return view('answer.answer')->withAnswer($answer);

        }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        return view('answer.create')->with([
            'questions'  => $questions
            
   
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
        
            'answer' => 'required',
            'image_name' => 'required',
        
            
        ]);
        
       
        $answer = new Answer();
        
        if($request->has('image_name')) {
            $image = $request->file('image_name');
              
             $filename = $image->getClientOriginalName();
             $image->move(public_path('images/certificate'), $filename);
             $answer->image_name = $request->file('image_name')->getClientOriginalName();
         }


        $answer->answer = $request->get('answer');
        $answer->is_active = $request->get('is_active');
        $answer->is_correct = $request->get('is_correct');
        $answer->question_id = $request->get('question_id');
        
        
        
        
       
        
        
        $answer->save();
        
       

        return redirect('/answers')->with('success', 'Answer Created!');
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
        
            'answer' => 'required',
            'image_name' => 'required',
        
            
        ]);
        $answer = Answer::find($request->input('id'));
        
        

        if($request->has('image_name')) {
            $image = $request->file('image_name');
              
             $filename = $image->getClientOriginalName();
             $image->move(public_path('images/certificate'), $filename);
             $answer->image_name = $request->file('image_name')->getClientOriginalName();
         }


        $answer->answer = $request->get('answer');
        $answer->is_active = $request->get('is_active');
        $answer->is_correct = $request->get('is_correct');
        $answer->question_id = $request->get('question_id');
        
        
        
        
       
        
        
        $answer->save();
        
       

        return redirect('/answers')->with('success', 'Answer Updated!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
  
        return redirect()->route('answer.answers')
        ->with('success','Answer deleted successfully');

    }
}
