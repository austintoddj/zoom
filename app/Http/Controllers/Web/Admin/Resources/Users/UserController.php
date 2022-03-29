<?php

namespace App\Http\Controllers\Web\Admin\Resources\Users;

use App\Entities\Users\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Resources\Users\StoreUser;
use App\Http\Requests\Resources\Users\UpdateUser;
use App\Interfaces\Meta\RoleInterface;
use App\Interfaces\Users\UserInterface;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
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
     * UserController constructor.
     *
     * @param  UserInterface  $userInterface
     * @param  RoleInterface  $roleInterface
     */
    public function __construct(UserInterface $userInterface, RoleInterface $roleInterface)
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
    }

    /**
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request): View
    {
        $data = [
            'users' => User::paginate(10),
        ];

        return view('admin.resources.users.index', compact('data'));
    }

    /**
     * @param  Request  $request
     * @return View
     */
    public function create(Request $request): View
    {
        $data = [
            'roles' => $this->roleInterface->all(),
        ];

        return view('admin.resources.users.create', compact('data'));
    }

    /**
     * @param  StoreUser  $request
     * @return RedirectResponse
     */
    public function store(StoreUser $request): RedirectResponse
    {
        try {
            $user = $this->userInterface->create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => isset($request->password) ? bcrypt($request->password) : $request->user()->password,
            ]);
            $user->assignRole($request->role);

            return back()->with('success', 'User has been created');
        } catch (Exception $e) {
            // Log the error message
            activity()->log($e->getMessage());

            return back()->with('error', 'User has not been created');
        }
    }

    /**
     * @param  Request  $request
     * @param $id
     * @return View
     */
    public function show(Request $request, $id): View
    {
        $data = [
            'user'  => $this->userInterface->find($id),
            'roles' => $this->roleInterface->all(),
        ];

        return view('admin.resources.users.show', compact('data'));
    }

    /**
     * @param  UpdateUser  $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateUser $request, $id): RedirectResponse
    {
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

            return back()->with('success', 'User has been updated');
        } catch (Exception $e) {
            // Log the error message
            activity()->log($e->getMessage());

            return back()->with('error', 'User has not been updated');
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $user = $this->userInterface->find($id);

        try {
            $user->delete();

            return redirect(route('users'))->with('success', 'User has been deleted');
        } catch (Exception $e) {
            // Log the error message
            activity()->log($e->getMessage());

            return redirect(route('users'))->with('error', 'User has not been deleted');
        }
    }
}
