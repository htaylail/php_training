<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDataController extends Controller
{
    public function index()
    {
        return view('userData.index');
    }

    public function getUserData()
    {
        $userData = UserData::all();
        dd($userData);
       // Console.log($userData);
        return json_encode(array('data'=>$userData));
    }
  
    public function create()
    {
        return view('userData.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        UserData::create($request->all());
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $userData = UserData::find($id);
        return view('userData.edit',compact('userData','id'));
    }

    
    public function update(Request $request, $id)
    {
        $userData = UserData::find($id);
        $userData->type = request('type');
        $userData->name = request('name');
        $userData->email = request('email');
        $userData->phone = request('phone');
        $userData->city = request('city');
        
        $userData->save();
       
        return json_encode(array('statusCode'=>200));
    }

    
    public function destroy($id)
    {
        UserData::find($id)->delete();        
        return json_encode(array('statusCode'=>200));
    }
}
