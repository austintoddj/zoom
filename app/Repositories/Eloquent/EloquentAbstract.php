<?php

namespace App\Repositories\Eloquent;

abstract class EloquentAbstract
{
    protected $model;

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @param array $with
     * @return mixed
     */
    public function find($id, array $with = [])
    {
        return $this->model->with($with)->findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data = [])
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data = [])
    {
        return $this->model->update($id, $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $object = $this->find($id);

        return $object->delete();
    }
}
