<?php

namespace App\Http\Controllers\Web\Admin;

use Exception;
use App\Helpers\Logs\Logger;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Meta\RoleInterface;
use App\Http\Requests\Users\UpdateUser;
use App\Interfaces\Users\UserInterface;

class SettingsController extends Controller
{
    /**
     * @var \Monolog\Logger
     */
    protected $log;

    /**
     * SettingsController constructor.
     */
    public function __construct()
    {
        $this->log = Logger::build('user');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roleContract = resolve(RoleInterface::class);

        $data = [
            'user'  => Auth::user(),
            'roles' => $roleContract->all(),
        ];

        return view('admin.settings.index', compact('data'));
    }

    /**
     * @param UpdateUser $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUser $request, $id)
    {
        $userContract = resolve(UserInterface::class);
        $user = $userContract->find($id);

        try {
            // Update the user
            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => isset($request->password) ? bcrypt($request->password) : $request->user()->password,
            ]);
            $user->syncRoles($request->role);

            return back()->with('success', 'Settings have been updated');
        } catch (Exception $e) {
            // Log the error message
            $this->log->error($e->getMessage());

            return back()->with('error', 'Settings have not been updated');
        }
    }
}
