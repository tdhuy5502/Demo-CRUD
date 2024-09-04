<?php

namespace App\Repositories;

interface IFaceRepository {

    public function getModel();

    public function getAll();

    public function getById(string $id);

    public function save(array $data, string $id);

    public function delete(string $id);
}