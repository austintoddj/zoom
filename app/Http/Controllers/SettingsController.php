<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateSettings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * Show the user settings page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('settings.index');
    }

    /**
     * Update a users settings.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $user = $request->user();

        validator($request->all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|max:255|'.Rule::unique('users', 'email')->ignore($user->id),
        ])->validate();

        dispatch(new UpdateSettings($user, $request->all()));

        return redirect(route('settings.index'));
    }
}
