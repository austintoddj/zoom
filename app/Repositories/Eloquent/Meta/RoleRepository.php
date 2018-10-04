<?php

namespace App\Repositories\Eloquent\Meta;

use App\Entities\Meta\Role as Model;
use App\Interfaces\Meta\RoleInterface;
use App\Repositories\Eloquent\EloquentAbstract;

class RoleRepository extends EloquentAbstract implements RoleInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * RoleRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
