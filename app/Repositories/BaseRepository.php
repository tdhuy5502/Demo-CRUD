<?php

namespace App\Repositories;

use Exception;

abstract class BaseRepository implements IFaceRepository {

    protected $model;

    abstract public function getModel();

    public function getById(string $id)
    {
        $result = $this->getModel()->find($id);
        if(empty($result))
        {
            throw new Exception();
        }

        return $result;
    }

    public function save($data , $id = null) {
        if($id == null) 
        {
            $result = $this->getModel()->fill($data);
        } 
        else 
        {
            $result = $this->getById($id);
            $result->fill($data);
        }
        $result->save();

        return $result;
    }

    public function delete($id)
    {
        $instance = $this->getById($id);
        if(!is_null($instance))
        {
            $instance->delete();
        }

        return true;
    }

    public function getAll()
    {
        return $this->getModel()->all();
    }
}