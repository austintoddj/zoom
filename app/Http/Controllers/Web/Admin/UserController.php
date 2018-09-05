<?php

namespace App\Http\Controllers\Web\Admin;

use Exception;
use App\Entities\Users\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUser;
use App\Interfaces\Meta\RoleInterface;
use App\Http\Requests\Users\UpdateUser;
use App\Interfaces\Users\UserInterface;

class UserController extends Controller
{
    const LOG = 'user';

    /**
     * @var UserInterface
     */
    protected $userInterface;

    /**
     * ProfileController constructor.
     *
     * @param UserInterface $userInterface
     */
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'users' => User::paginate(15),
        ];

        return view('admin.users.index', compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * @param StoreUser $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUser $request)
    {
        try {
            $new_user = $this->userInterface->create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => isset($request->password) ? bcrypt($request->password) : $request->user()->password,
            ]);

            activity(self::LOG)->performedOn($new_user)->causedBy(auth()->user())->log('create');

            return back()->with('success', 'User has been created');
        } catch (Exception $e) {
            // Log the error message
            activity(self::LOG)->causedBy(auth()->user())->withProperties([$e->getMessage()])->log('create_failed');

            return back()->with('error', 'User has not been created');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $roleContract = resolve(RoleInterface::class);

        $data = [
            'user'  => $this->userInterface->find($id),
            'roles' => $roleContract->all(),
        ];

        return view('admin.users.show', compact('data'));
    }

    /**
     * @param UpdateUser $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUser $request, $id)
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

            activity(self::LOG)->performedOn($user)->causedBy(auth()->user())->log('update');

            return back()->with('success', 'User has been updated');
        } catch (Exception $e) {
            // Log the error message
            activity(self::LOG)->causedBy(auth()->user())->withProperties([$e->getMessage()])->log('update_failed');

            return back()->with('error', 'User has not been updated');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = $this->userInterface->find($id);

        try {
            $user->delete();
            activity(self::LOG)->performedOn($user)->causedBy(auth()->user())->log('destroy');

            return redirect(route('users'))->with('success', 'User has been deleted');
        } catch (Exception $e) {
            // Log the error message
            activity(self::LOG)->causedBy(auth()->user())->withProperties([$e->getMessage()])->log('destroy_failed');

            return redirect(route('users'))->with('error', 'User has not been deleted');
        }
    }
}
