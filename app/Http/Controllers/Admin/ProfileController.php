<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email,'.Auth::user()->id.'|required|email',
        ]);

        $subject = User::where('email', $request->email)->first();
        $causer = Auth::user();

        // Update the user profile in the database
        $subject->update($request->all());

        // Log the update activity
        activity()
            ->causedBy($causer)
            ->performedOn($subject)
            ->withProperties([
                'attributes' => [
                    'name' => $request->name,
                    'email' => $request->email,
                ],
                'old' => [
                    'name' => $subject->name,
                    'email' => $subject->email,
                ],
            ])
            ->log('user.update');

        return back()->with('success', 'Your profile has been updated!');
    }
}
