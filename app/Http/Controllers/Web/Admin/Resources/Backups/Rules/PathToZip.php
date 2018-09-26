<?php

namespace App\Http\Controllers\Web\Admin\Resources\Backups\Rules;

use Illuminate\Contracts\Validation\Rule;

class PathToZip implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ends_with($value, '.zip');
    }

    /**
     * @return string
     */
    public function message()
    {
        return 'The given value must be a path to a zip file.';
    }
}