<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository {

    public function getModel()
    {
        return new Post();
    }

    public function create(array $data)
    {
        $post = $this->save($data);
        $this->model = $post;

        return $post;
    }

    public function update($data)
    {
        $post = $this->save($data, $data['id']);
        $this->model = $post;

        return true;
    }

    public function delete($id)
    {
        $post = $this->getById($id);
        $post->delete();
    }
}