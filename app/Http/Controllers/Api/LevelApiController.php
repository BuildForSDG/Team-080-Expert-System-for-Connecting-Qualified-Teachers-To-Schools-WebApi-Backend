<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\LevelResource;
use App\Level;
use App\Http\Controllers\Controller;
class LevelApiController extends Controller
{
    public function index(){
        return LevelResource::collection(Level::paginate(5));
    }

    public function show($id)
        {
           
            return new LevelResource(Level::find($id));
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
        
       

        return response()->json(['message'=> 'level created', 
        'level' => $level]);
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
        
       

        return response()->json(['message'=> 'level created', 
        'level' => $level]);
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
  
        return response()->json([
            'message' => 'level deleted'
        ]);
    }
}
