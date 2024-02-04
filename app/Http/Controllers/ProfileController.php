<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }



    ////////////////////////////////////////
    public function updateProfile(Request $request)
{
    $userId = auth()->user()->id;

    $request->validate([
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email',
        'oldpassword' => 'nullable|string',
        'newpassword' => 'nullable|string',
    ]);

    // Manually update user profile information
    $user = User::find($userId);
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->email = $request->input('email');
    $user->save();

    // Check and update the password
    $passwordUpdated = $this->updatePassword($user, $request->input('oldpassword'), $request->input('newpassword'));

    if ($passwordUpdated) {
        // Password updated successfully, redirect to the appropriate dashboard
        $userRole = auth()->user()->role;
        $redirectRoute = 'auth.login'; 

        if ($userRole == 'admin') {
            $redirectRoute = 'adminDashboard';
        } elseif ($userRole == 'parent') {
            $redirectRoute = 'parentDashboard';
        } elseif ($userRole == 'teacher') {
            $redirectRoute = 'teacherDashboard';
        }

        return redirect()->route($redirectRoute)->with('success', 'Profile updated successfully.');
    } else {
        // Old password is incorrect, redirect back with an error message
        return redirect()->back()->with('error', 'Old password is incorrect.')->withInput();
    }
}

private function updatePassword($user, $oldPassword, $newPassword)
{
    if ($oldPassword && $newPassword) {
        if (Hash::check($oldPassword, $user->password)) {
            $user->password = Hash::make($newPassword);
            $user->save();
            return true; // Password updated successfully
        } else {
            return false; // Old password is incorrect
        }
    }

    return true; // No password update required
}



    

 

}
