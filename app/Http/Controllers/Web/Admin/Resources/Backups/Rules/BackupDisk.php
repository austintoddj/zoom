<?php

namespace App\Http\Controllers\Web\Admin\Resources\Backups\Rules;

use Illuminate\Contracts\Validation\Rule;

class BackupDisk implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $configuredBackupDisks = config('backup.backup.destination.disks');

        return in_array($value, $configuredBackupDisks);
    }

    /**
     * @return string
     */
    public function message()
    {
        return 'This disk is not configured as a backup disk.';
    }
}
