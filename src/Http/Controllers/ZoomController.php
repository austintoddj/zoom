<?php

namespace Zoom\Http\Controllers;

use Illuminate\Routing\Controller;

class ZoomController extends Controller
{
    /**
     * Get the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('zoom::dashboard.index');
    }
}
