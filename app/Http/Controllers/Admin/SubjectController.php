<?php

namespace App\Http\Controllers;
use App\Http\Resources\SubjectResource;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::with(['level'])->paginate(5);
        return view('subject.subjects')->withSubjects($subjects);
    }

    public function show($id)
        {
           
            $subject = Subject::find($id);
            return view('subject.subject')->withSubject($subject);
        }

         /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
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
        
       

        return redirect('/subjects')->with('success', 'Subject Created!');
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
        
       

        return redirect('/subjects')->with('success', 'Subject Updated!');
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
  
        return redirect()->route('subject.subjects')
        ->with('success','Subject deleted successfully');
    }
}
