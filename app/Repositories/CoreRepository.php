<?php


namespace App\Repositories;


abstract class CoreRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelsClass());
    }
    abstract protected function getModelsClass();

    protected function startConditions(){
        return clone $this->model;
    }
    public function getById($id){
        return $this->startConditions()->find($id);
    }

    public function getRequest($get = true, $id ='id'){
        if($get)
            $data = $_GET;
        else
            $data = $_POST;

        $id = $data[$id] ?? null;

        if(!$id)
            throw new \Exception('No id','404');

        return $id;
    }

}
