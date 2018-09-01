<?php

namespace App\Http\Controllers\Web\Admin\Datatables;

use Exception;
use App\Entities\Users\User;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @return mixed
     * @throws Exception
     */
    public function __invoke()
    {
        return Datatables::of(User::query())->make(true);
    }
}
