<?php

namespace App\Http\Controllers\Web\Admin;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Meta\RoleInterface;
use App\Http\Requests\Users\UpdateUser;
use App\Interfaces\Users\UserInterface;

class SettingsController extends Controller
{
    const LOG = 'settings';

    /**
     * @var UserInterface
     */
    protected $userInterface;

    /**
     * @var RoleInterface
     */
    protected $roleInterface;

    /**
     * SettingsController constructor.
     *
     * @param UserInterface $userInterface
     * @param RoleInterface $roleInterface
     */
    public function __construct(UserInterface $userInterface, RoleInterface $roleInterface)
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'user'  => Auth::user(),
            'roles' => $this->roleInterface->all(),
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
        // Find the user
        $user = $this->userInterface->find($id);

        // Save original attribute values
        $oldName = $user->name;
        $oldEmail = $user->email;

        try {
            // Update the user
            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => isset($request->password) ? bcrypt($request->password) : $request->user()->password,
            ]);
            $user->syncRoles($request->role);

            // Log the activity
            activity(self::LOG)->performedOn($user)->causedBy($user)->withProperties([
                'attributes' => [
                    'name'  => $request->name,
                    'email' => $request->email,
                ],
                'old'        => [
                    'name'  => $oldName,
                    'email' => $oldEmail,
                ],
            ])->log('update');

            return back()->with('success', 'Settings have been updated');
        } catch (Exception $e) {
            // Log the error message
            activity(self::LOG)->performedOn($user)->causedBy($user)->withProperties([$e->getMessage()])->log('update_failed');

            return back()->with('error', 'Settings have not been updated');
        }
    }
}
