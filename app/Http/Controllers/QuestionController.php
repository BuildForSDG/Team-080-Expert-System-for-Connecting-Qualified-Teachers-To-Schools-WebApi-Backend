<?php

namespace App\Http\Controllers;
use App\Http\Resources\QuestionResource;
use App\Question;
use App\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        $questions = Question::with(['subject'])->paginate(5);
        return view('question.questions')->withQuestions($questions);
    }

    public function show($id)
        {
           
            $question = Question::find($id);
            $subjects = Subject::all();
            return view('question.question')->with(['question' => $question, 'subjects' => $subjects]);
        }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $subjects = Subject::all();
        return view('question.create')->with([
            'subjects'  => $subjects
            
   
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
        
            'question' => 'required',
            'image_name' => 'required',
            'subject_name' => 'required'
        
            
        ]);
        
       
        $question = new Question();
        
        if($request->has('image_name')) {
            $image = $request->file('image_name');
              
             $filename = $image->getClientOriginalName();
             $image->move(public_path('images/certificate'), $filename);
             $question->image_name = $request->file('image_name')->getClientOriginalName();
         }


        $question->question = $request->get('question');
        $question->is_active = $request->get('is_active');
        $question->is_german = $request->get('is_german');
        $question->subject_id = $request->get('subject_name');
        
        
        
        
       
        
        
        $question->save();
        
       

        return redirect('/questions/index')->with('success', 'Question Created!');
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
            'subject_name' => 'required'
        
            
        ]);
        $question = Question::find($request->input('id'));
        
        

        if($request->has('image_name')) {
            $image = $request->file('image_name');
              
             $filename = $image->getClientOriginalName();
             $image->move(public_path('images/certificate'), $filename);
             $question->image_name = $request->file('image_name')->getClientOriginalName();
         }


        $question->question = $request->get('question');
        $question->is_active = $request->get('is_active');
        $question->is_german = $request->get('is_german');
        $question->subject_id = $request->get('subject_name');
        
        
        
       
        
        
        $question->save();
        
       

        return redirect('/questions/index')->with('success', 'Question Updated!');
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
  
        return redirect()->route('question.questions')
        ->with('success','Question deleted successfully');
    
    }
}
