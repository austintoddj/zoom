<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $activity = Activity::orderBy('created_at', 'desc')->get();
        $data = [
            'activity' => $activity->take(25),
            'session' => [
                'ip' => $_SERVER['REMOTE_ADDR'],
                'browser' => Helper::getBrowser($_SERVER['HTTP_USER_AGENT']),
                'operatingSystem' => Helper::getOperatingSystem($_SERVER['HTTP_USER_AGENT']),
                'lastAccessed' => Carbon::parse($activity->where('causer_id', Auth::user()->id)->where('description', 'login')->last()->toArray()['created_at'])->toFormattedDateString(),
            ],
        ];

        return view('admin.security.index', compact('data'));
    }
}
