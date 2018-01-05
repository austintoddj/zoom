<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * Show the Status page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('admin.status.index');
    }
}
