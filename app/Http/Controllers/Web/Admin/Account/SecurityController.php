<?php

namespace App\Http\Controllers\Web\Admin\Account;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class SecurityController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $data = [
            'actions' => Activity::where('causer_id', auth()->user()->id)
                ->orderByDesc('created_at')
                ->paginate(10),
        ];

        return view('admin.account.security.index', compact('data'));
    }
}
