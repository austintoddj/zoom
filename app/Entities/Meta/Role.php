<?php

namespace App\Entities\Meta;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    /**
     * @var string
     */
    protected $table = 'roles';
}
