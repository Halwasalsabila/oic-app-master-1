<?php

namespace App\Http\Controllers;

use  App\Models\User;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $destination_path = 'public/images/profiles';
            $image =  $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            // $request->image->move(public_path('images/profile'), $imageName);
            $user->photo_profile = $image_name;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('profile.index')->with('success', 'Data berhasil diubah');
    }
}
