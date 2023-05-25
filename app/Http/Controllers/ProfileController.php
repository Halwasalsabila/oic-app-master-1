<?php

namespace App\Http\Controllers;
use  App\Models\User;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function index()
    {
        return view('profile');
    }
    
    public function update(ProfileRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/profile'), $imageName); 
        }
        $user->save();
        dd($user);
        dd($request->all());
    }
}
