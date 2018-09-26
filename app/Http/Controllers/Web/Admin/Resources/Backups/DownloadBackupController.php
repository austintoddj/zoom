<?php

namespace App\Http\Controllers\Web\Admin\Resources\Backups;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Http\Controllers\Web\Admin\Resources\Backups\Rules\PathToZip;
use App\Http\Controllers\Web\Admin\Resources\Backups\Rules\BackupDisk;

class DownloadBackupController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response|StreamedResponse
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'disk' => new BackupDisk(),
            'path' => ['required', new PathToZip()],
        ]);

        dd($validated);

        $backupDestination = BackupDestination::create($validated['disk'], config('backup.backup.name'));

        $backup = $backupDestination->backups()->first(function (Backup $backup) use ($validated) {
            return $backup->path() === $validated['path'];
        });

        if (! $backup) {
            return response('Backup not found', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->respondWithBackupStream($backup);
    }

    /**
     * @param Backup $backup
     * @return StreamedResponse
     */
    public function respondWithBackupStream(Backup $backup): StreamedResponse
    {
        $fileName = pathinfo($backup->path(), PATHINFO_BASENAME);

        $downloadHeaders = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Type' => 'application/zip',
            'Content-Length' => $backup->size(),
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            'Pragma' => 'public',
        ];

        return response()->stream(function () use ($backup) {
            $stream = $backup->stream();

            fpassthru($stream);

            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, $downloadHeaders);
    }
}
