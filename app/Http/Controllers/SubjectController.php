<?php

namespace App\Http\Controllers;
use App\Http\Resources\SubjectResource;
use App\Subject;
use App\Level;
use DB;
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
            $levels = Level::all();
            return view('subject.subject')->with(['subject' => $subject,'levels' => $levels]);
        }

         /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('subject.create')->with([
            'levels'  => $levels
            
   
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
        
            'name' => 'required',
            'level_name' => 'required'
            
        ]);
        
       
        $subject = new Subject();
        
        

        $subject->name = $request->get('name');
        $subject->level_id = $request->get('level_name');
        
        
        
       
        
        
        $subject->save();
        
       

        return redirect('/subjects/index')->with('success', 'Subject Created!');
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
        
            'name' => 'required',
            'level_name' => 'required'
            
        ]);
  
        $subject = Subject::find($request->input('id'));
        
        

       
        $subject->name = $request->get('name');
        $subject->level_id = $request->get('level_name');
        
        
        
       
        
        
        $subject->save();
        
       

        return redirect('/subjects/index')->with('success', 'Subject Updated!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        
  
        DB::delete('delete from subjects where id = ?',[$id]);
        return redirect('/subjects')->with('success', 'Subject  deleted!');
    }
}
