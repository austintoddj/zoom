<?php

namespace App\Http\Controllers\Web\Admin\Resources\Backups;

use Illuminate\Http\Request;
use Spatie\Backup\Helpers\Format;
use App\Http\Controllers\Controller;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatus;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backups = BackupDestinationStatusFactory::createForMonitorConfig(config('backup.monitorBackups'))
            ->map(function (BackupDestinationStatus $backupDestinationStatus) {
                return [
                    'name'        => $backupDestinationStatus->backupName(),
                    'disk'        => $backupDestinationStatus->diskName(),
                    'reachable'   => $backupDestinationStatus->isReachable(),
                    'healthy'     => $backupDestinationStatus->isHealthy(),
                    'amount'      => $backupDestinationStatus->amountOfBackups(),
                    'newest'      => $backupDestinationStatus->dateOfNewestBackup()
                        ? $backupDestinationStatus->dateOfNewestBackup()->diffForHumans()
                        : 'No backups present',
                    'usedStorage' => $backupDestinationStatus->humanReadableUsedStorage(),
                ];
            });

        return view('admin.resources.backups.index')->with(compact('backups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $disk
     * @return \Illuminate\Http\Response
     */
    public function show($disk)
    {
        $backups = BackupDestination::create($disk, config('backup.backup.name'))->backups()->map(function (Backup $backup) {
            return [
                'file' => str_replace(str_replace(' ', '-', config('backup.backup.name')).'/', '', $backup->path()),
                'slug' => str_slug($backup->path()),
                'path' => $backup->path(),
                'date' => $backup->date()->format('Y-m-d H:i:s'),
                'size' => Format::humanReadableSize($backup->size()),
            ];
        });

        return view('admin.resources.backups.show')->with(compact('backups'));
    }
}
