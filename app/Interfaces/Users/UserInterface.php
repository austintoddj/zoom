<?php

namespace App\Interfaces\Users;

use App\Interfaces\BaseInterface;

interface UserInterface extends BaseInterface
{
    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email);
}
