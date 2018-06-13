<?php

namespace App\Repositories\Eloquent\Users;

use App\Entities\Users\User;
use App\Interfaces\Users\UserInterface;
use App\Repositories\Eloquent\EloquentAbstract;

class UserRepository extends EloquentAbstract implements UserInterface
{
    /**
     * @var User
     */
    protected $model;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data = [])
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}
