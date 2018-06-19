<?php

namespace App\Interfaces;

interface BaseInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

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
}
