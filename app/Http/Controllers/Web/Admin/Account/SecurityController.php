<?php

namespace App\Http\Controllers\Web\Admin\Account;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class SecurityController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $data = [
            'actions' => Activity::with('subject', 'causer')
                ->where('causer_id', auth()->user()->id)
                ->orderByDesc('created_at')
                ->paginate(10),
        ];

        return view('admin.account.security.index', compact('data'));
    }
}
