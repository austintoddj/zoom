<?php

namespace App\Repositories\Eloquent\Users;

use App\Entities\Users\User;
use App\Interfaces\Users\UserInterface;
use App\Repositories\Eloquent\RepositoryAbstract;

class UserRepository extends RepositoryAbstract implements UserInterface
{
    /**
     * @var User
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param $email
     * @return User
     */
    public function findByEmail($email): User
    {
        return $this->model->where('email', $email)->first();
    }
}
