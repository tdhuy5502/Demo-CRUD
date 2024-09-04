<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository {
    public function getModel()
    {
        return new User();
    }

    public function create(array $data)
    {
        $user = $this->save($data);
        $this->model = $user;

        return $user;
    }

    public function update($data)
    {
        $user = $this->save($data, $data['id']);
        $this->model = $user;

        return true;
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        $user->delete();
    }
}