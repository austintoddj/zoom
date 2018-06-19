<?php

namespace App\Interfaces\Users;

use App\Interfaces\InterfaceAbstract;

interface UserInterface extends InterfaceAbstract
{
    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email);
}
