<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserTypeResource;
use App\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function index(){
        return UserTypeResource::collection(UserType::paginate(5));
    }

    public function show($id)
        {
           
            return new UserTypeResource(UserType::find($id));
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
            'code' => 'required'
            
        ]);
        
       
        $usertype = new UserType();
        
        

        $usertype->name = $request->get('name');
        $usertype->code = $request->get('code');
        
        
        
       
        
        
        $usertype->save();
        
       

        return response()->json(['message'=> 'user type created', 
        'usertype' => $usertype]);
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  UpdateUserType  $userType
     * @return IlluminateHttpResponse
     */
    public function update(Request $request)
    {
        $request->validate([
        
            'name' => 'required',
            'code' => 'required'
            
        ]);
  
        $usertype = UserType::find($request->input('id'));
        
        

       
        $usertype->name = $request->get('name');
        $usertype->code = $request->get('code');
        
        
        
       
        
        
        $usertype->save();
        
       

        return response()->json(['message'=> 'user type updated', 
        'usertype' => $usertype]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserType $usertype)
    {
        $usertype->delete();
  
        return response()->json([
            'message' => 'user type deleted'
        ]);
    }
}
