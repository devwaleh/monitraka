<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EditController extends Controller
{
    public function edit_user (Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:20',
            'email'=>'required|min:6'
        ]);

        $id = auth()->id();

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $saved = $user->save();

        if ($saved) {
            return redirect()->route('setting.create')->with("success","User updated successfully");
        } else {
            return redirect()->route('setting.create')->with("error","User couldn't be updated");
        }
        // dd($user);
    }

    public function edit_password (Request $request)
    {

        $validated = $request->validate([
            'current_password'=> ['required', 'current_password'],
            'password'=>['required', Password::defaults(), 'confirmed']
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'password-updated');
        // dd($validated);
    }
}
