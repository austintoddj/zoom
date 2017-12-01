<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        // Grab the old attribute values
        $oldName = Auth::user()->name;
        $oldEmail = Auth::user()->email;

        // Validate the request data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email,'.Auth::user()->id.'|required|email',
        ]);

        // Update the user profile in the database
        Auth::user()->update($request->all());

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
            ->log('update');

        return back()->with('success', 'Your profile has been updated!');
    }
}
