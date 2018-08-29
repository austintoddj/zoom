<?php

namespace App\Entities\Meta;

use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    /**
     * @var string
     */
    protected $table = 'permissions';
}