<?php

namespace App\Interfaces\Users;

use App\Interfaces\InterfaceAbstract;

interface UserInterface extends InterfaceAbstract
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data = []);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data = []);

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email);
}
