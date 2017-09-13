<?php

namespace App\Container\Overall\Src\Repository;


/*
 * Interfaces
 */
use App\Container\Overall\Src\Interfaces\ControllerInterface;

/*
 * Facades
 */

use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

/*
 * Modelos
 */


abstract class ControllerRepository implements ControllerInterface
{

    private $model;

    public function __construct($model = null)
    {
        $this->model = App::make($model);
    }

    /**
     * Display a listing of the resource.
     *
     * @param array $relations
     * @return Response
     */
    public function index($relations = [])
    {
        $models = $this->model->all();

        if (count($relations))
            $models->load($relations);
        return $models;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $data
     * @return Response
     * @internal param \Illuminate\Http\Request $request
     */
    public function store($data)
    {
        //Crear una nueva instancia del modelo dado.
        $model = $this->model->newInstance([]);
        return $this->process($model, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param array $relations
     * @return Response
     */
    public function show($id, $relations = [])
    {
        $model = $this->model->find($id);
        if (count($relations))
            $model->load($relations);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $data
     * @return Response
     * @internal param \Illuminate\Http\Request $request
     * @internal param int $id
     */
    public function update($data)
    {
        $model = $this->model->find($data['id']);
        return $this->process($model, $data);
    }

    /**
     * Remove the specified resource from storage. Physically
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

    /**
     * Remove the specified resource from storage. Logically
     *
     * @param  int $id
     * @return Response
     */
    public function destroy_soft($id)
    {
        $model = $this->model->withTrashed()->find($id);
        return $model->delete();
    }

    /**
     * @return Response
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param null $model
     * @return ControllerRepository
     */
    public function setModel($model)
    {
        $this->model = App::make($model);
        return $this;
    }

    /**
     * @param $model
     * @param $data
     * @return mixed
     */
    abstract protected function process($model, $data);

}