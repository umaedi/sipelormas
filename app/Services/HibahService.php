<?php

namespace App\Services;

use App\Models\Hibah;

class HibahService
{
    protected $hibah;
    public function __construct(Hibah $hibah)
    {
        $this->hibah = $hibah;
    }

    public function Query()
    {
        return  $this->hibah->query();
    }

    public function find($id)
    {
        return $this->hibah->find($id);
    }

    public function store($data)
    {
        return $this->hibah->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->hibah->find($id);
        $model->update($data);
        return $model;
    }

    public function softDelete($id)
    {
        $model = $this->hibah->find($id);
        return $model->delete();
    }
}
