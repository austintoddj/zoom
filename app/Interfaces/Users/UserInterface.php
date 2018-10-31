<?php

namespace App\Interfaces\Users;

use App\Entities\Users\User;
use App\Interfaces\InterfaceAbstract;

interface UserInterface extends InterfaceAbstract
{
    /**
     * @param $email
     * @return User
     */
    public function findByEmail($email): User;
}
