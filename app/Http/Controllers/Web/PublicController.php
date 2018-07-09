<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('public.home.index');
    }
}
