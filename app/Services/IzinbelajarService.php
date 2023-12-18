<?php

namespace App\Services;

use App\Models\Izinbelajar;

use function PHPUnit\Framework\returnSelf;

class IzinbelajarService
{
    protected $izinbelajar;
    public function __construct(Izinbelajar $izinbelajar)
    {
        $this->izinbelajar = $izinbelajar;
    }

    public function store($data)
    {
        return $this->izinbelajar->create($data);
    }

    public function find($id)
    {
        $model = $this->izinbelajar->find($id);
        return $model;
    }

    public function update($id, $status, $pesan = null, $suratizin = null)
    {
        $model = $this->izinbelajar->find($id);
        $model->update([
            'status'    => $status,
            'pesan'     => $pesan,
            'suratizin' => $suratizin
        ]);
        return $model;
    }

    public function Query()
    {
        return $this->izinbelajar->query();
    }

    public function softDelete($id)
    {
        $model = $this->izinbelajar->find($id);
        return $model->delete();
    }
}
