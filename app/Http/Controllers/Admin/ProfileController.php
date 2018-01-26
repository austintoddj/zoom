<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the Profile Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Save original attribute values
        $oldName = Auth::user()->name;
        $oldEmail = Auth::user()->email;

        // Validate the request data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email,'.Auth::user()->id.'|required|email',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update the user profile in the database
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        if (isset($request->password)) {
            Auth::user()->password = bcrypt($request->password);
        }
        Auth::user()->save();

        // Log the update activity
        activity('user')
            ->causedBy(Auth::user())
            ->performedOn(Auth::user())
            ->withProperties([
                'attributes' => [
                    'name' => $request->name,
                    'email' => $request->email,
                ],
                'old' => [
                    'name' => $oldName,
                    'email' => $oldEmail,
                ],
            ])
            ->log('profile_update');

        return back()->with('success', trans('notifications.update_success', ['entity' => 'Profile']));
    }
}