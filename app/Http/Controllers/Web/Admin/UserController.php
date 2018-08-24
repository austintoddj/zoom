<?php

namespace App\Http\Controllers\Web\Admin;

use Exception;
use App\Helpers\Logs\Logger;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUser;
use App\Http\Requests\Users\UpdateUser;
use App\Interfaces\Users\UserInterface;

class UserController extends Controller
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
        $this->log = Logger::build('user');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'users' => $this->userInterface->all(),
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
            $this->userInterface->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => isset($request->password) ? bcrypt($request->password) : $request->user()->password,
            ]);

            return back()->with('success', 'User has been created');
        } catch (Exception $e) {
            // Log the error message
            $this->log->error($e->getMessage());

            return back()->with('error', 'User has not been created');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data = [
            'user' => $this->userInterface->find($id),
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
                'name' => $request->name,
                'email' => $request->email,
                'password' => isset($request->password) ? bcrypt($request->password) : $request->user()->password,
            ]);

            return back()->with('success', 'User has been updated');
        } catch (Exception $e) {
            // Log the error message
            $this->log->error($e->getMessage());

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

            return redirect(route('users'))->with('success', 'User has been deleted');
        } catch (Exception $e) {
            $this->log->error($e->getMessage());

            return redirect(route('users'))->with('error', 'User has not been deleted');
        }
    }
}
