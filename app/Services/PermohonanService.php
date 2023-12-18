<?php

namespace App\Services;

use App\Models\Permohonan;

class PermohonanService
{
    protected $permohonan;
    public function __construct(Permohonan $permohonan)
    {
        $this->permohonan = $permohonan;
    }

    public function store($data)
    {
        return $this->permohonan->create($data);
    }

    public function get()
    {
        return $this->permohonan->get();
    }

    public function find($id)
    {
        $model = $this->permohonan->find($id);
        return $model;
    }

    public function update($id, $data)
    {
        $model = $this->permohonan->find($id);
        $model->update($data);
        return $model;
    }

    public function Query()
    {
        return $this->permohonan->query();
    }

    public function count()
    {
        return $this->permohonan->count();
    }

    public function softDelete($id)
    {
        $model = $this->permohonan->find($id);
        return $model->delete();
    }
}
