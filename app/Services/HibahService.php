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

    public function store($data)
    {
        return $this->hibah->create($data);
    }
}
