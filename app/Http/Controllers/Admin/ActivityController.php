<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = DB::table('activity_log')->orderBy('created_at', 'desc')->simplePaginate(15);

        return view('admin.activity.index', ['activity' => $activity]);
    }
}
