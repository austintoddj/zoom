<?php

namespace App\Http\Controllers\Web\Admin\Account;

use Exception;
use App\Http\Controllers\Controller;
use App\Interfaces\Meta\RoleInterface;
use App\Interfaces\Users\UserInterface;
use App\Http\Requests\Resources\Users\UpdateUser;

class SettingsController extends Controller
{
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
            'user'    => auth()->user(),
            'roles'   => $this->roleInterface->all(),
        ];

        return view('admin.account.settings.index', compact('data'));
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

        try {
            // Update the user
            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => isset($request->password) ? bcrypt($request->password) : $request->user()->password,
            ]);
            if (isset($request->role)) {
                $user->syncRoles($request->role);
            }

            return back()->with('success', 'Settings have been updated');
        } catch (Exception $e) {
            // Log the error message
            activity()->log($e->getMessage());

            return back()->with('error', 'Settings have not been updated');
        }
    }
}
