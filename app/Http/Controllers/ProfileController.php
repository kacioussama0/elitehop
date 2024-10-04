<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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


    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image'
        ]);

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars','public');

            $request->user()->avatar = $avatar;

            $request->user()->save();

            return Redirect::route('profile.edit')->with('status', 'تم تغيير الصورة بنجاح');

        }

        abort(500);

    }


    public function updateInfo(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email,' . $request->user()->id,
            'username' => 'required|unique:users,username,' . $request->user()->id,
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'phone' => 'required|max:10|min:10',
        ]);

        $request->user()->email = $request->email;
        $request->user()->username = $request->username;
        $request->user()->date_of_birth = $request->date_of_birth;
        $request->user()->gender = $request->gender;
        $request->user()->phone = $request->phone;

        if($request->user()->save()) {
            return Redirect::route('profile.edit')->with('status', 'تم تحديث المعلومات الشخصية');
        }

        abort(500);
    }


    public function updateAdditionalInfo(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:128',
            'last_name' => 'required|max:128',
            'bio' => 'nullable|max:300',
            'place_of_birth' => 'nullable|max:300',
            'address' => 'nullable|max:300',
            'school_level' => 'nullable|max:300',

        ]);

        $request->user()->first_name = $request->first_name;
        $request->user()->last_name = $request->last_name;
        $request->user()->bio = $request->bio;
        $request->user()->place_of_birth = $request->place_of_birth;
        $request->user()->address = $request->address;
        $request->user()->school_level = $request->school_level;

        if($request->user()->save()) {
            return Redirect::route('profile.edit')->with('status', 'تم تحديث المعلومات');
        }

        abort(500);
    }



    public function updatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $request->user()->password = bcrypt($request->new_password);

        if($request->user()->save()) {
            return Redirect::route('profile.edit')->with('status', 'تم تحديث كلمة السر');
        }

        abort(500);


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
//    public function destroy(Request $request): RedirectResponse
//    {
//        $request->validateWithBag('userDeletion', [
//            'password' => ['required', 'current_password'],
//        ]);
//
//        $user = $request->user();
//
//        Auth::logout();
//
//        $user->delete();
//
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
//
//        return Redirect::to('/');
//    }
}
