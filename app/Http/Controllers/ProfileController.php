<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
 {
    public function edit() {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'phone_number' => 'required|numeric',
            'position' => 'required|string|max:255',
            'bio' => 'required|string',
            'location' => 'required|string',
            'avatar' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->position = $request->position;
        $user->bio = $request->bio;
        $user->location = $request->location;

        // Jika password diisi, maka perbarui password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Proses upload avatar
        if ($request->hasFile('avatar')) {
            if ($user->avatar && file_exists(public_path('images/profile/'.$user->avatar))) {
                unlink(public_path('images/profile/'.$user->avatar));
            }
            $image = $request->file('avatar');
            $avatar_imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/profile'), $avatar_imageName);
            $user->avatar = $avatar_imageName;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
 }
