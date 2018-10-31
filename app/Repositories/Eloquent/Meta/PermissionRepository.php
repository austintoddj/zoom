<?php

namespace App\Repositories\Eloquent\Meta;

use App\Entities\Meta\Permission as Model;
use App\Interfaces\Meta\PermissionInterface;
use App\Repositories\Eloquent\RepositoryAbstract;

class PermissionRepository extends RepositoryAbstract implements PermissionInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * PermissionRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
