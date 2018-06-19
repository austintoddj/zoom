<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Helpers\Logs\Logger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Users\UserInterface;

class ProfileController extends Controller
{
    /**
     * @var UserInterface
     */
    protected $userInterface;

    /**
     * @var \Monolog\Logger
     */
    protected $log;

    /**
     * ProfileController constructor.
     * @param UserInterface $userInterface
     */
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
        $this->log = Logger::build('profile', 'user');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.profile.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email,'.$request->user()->id.'|required|email',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        try {
            // Update the user profile
            $this->userInterface->update($request->user()->id, [
                'name' => $request->name,
                'email' => $request->email,
                'password' => isset($request->password) ? bcrypt($request->password) : $request->user()->password,
            ]);

            return back()->with('success', __('profile/notifications.update.success', ['entity' => 'Profile']));
        } catch (Exception $e) {
            // Log the error
            $this->log->error($e->getMessage());

            return back()->with('error', __('profile/notifications.update.error', ['entity' => 'Profile']));
        }
    }
}
