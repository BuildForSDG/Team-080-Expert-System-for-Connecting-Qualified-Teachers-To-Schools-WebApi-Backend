<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Resources\LevelResource;
use App\Level;
class LevelController extends Controller
{
    public function index(){
        $levels = Level::paginate(5);

        return view('level.levels')->withLevels($levels);
    }

    public function show($id)
        {
           
            $level = Level::find($id);
            return view('level.level')->withLevel($level);
        }

         /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('level.create');
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
            'level_group' => 'required'
            
        ]);
        
       
        $level = new Level();
        
        

        $level->name = $request->get('name');
        $level->level_group = $request->get('level_group');
        
        
       
        
        
        $level->save();
        
       

        return redirect('/levels')->with('success', 'Level Created!');
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateLevel  $level
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'name' => 'required',
            'level_group' => 'required'
        ]);
  
        $level = Level::find($request->input('id'));
        
        

        $level->name = $request->get('name');
        $level->level_group = $request->get('level_group');
        
        
       
        
        
        $level->save();
        
       

        return redirect('/levels')->with('success', 'Level Updated!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
  
        return redirect()->route('level.levels')
        ->with('success','Level deleted successfully');
    }
}
