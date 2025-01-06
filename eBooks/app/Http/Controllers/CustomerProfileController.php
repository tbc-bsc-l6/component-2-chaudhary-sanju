<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerProfileController extends Controller
{
    // Update profile details (name, email, and optionally password)
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
    
        // Validation rules
        $rules = [
            'name' => 'required|min:5|max:255',
            'password' => 'nullable|min:8|confirmed',
            'current_password' => 'nullable', // Make old password nullable
        ];
    
        // Validate the input
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()
                ->route('account.dashboard', $user->id)
                ->withInput()
                ->withErrors($validator);
        }
    
        // If old password is provided, check if it matches the current password
        if ($request->current_password && !Hash::check($request->current_password, $user->password)) {
            return redirect()
                ->route('account.dashboard', $user->id)
                ->withErrors(['current_password' => 'The old password does not match.'])
                ->withInput();
        }
    
        // Update user details
        $user->name = $request->name;
    
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()
            ->route('account.dashboard')
            ->with('success', 'User updated successfully');
    }
}    
