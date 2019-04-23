<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Process an image upload.
     *
     * @return string
     */
    public function store(): string
    {
        $path = request()->image->store('public/images', [
            'disk'       => 'local',
            'visibility' => 'public',
        ]);

        return Storage::disk('local')->url($path);
    }
}
