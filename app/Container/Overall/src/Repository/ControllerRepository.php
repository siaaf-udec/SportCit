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

    private $model = null;

    public function __construct($model = '')
    {
        $this->model = App::make($model);
    }

    /**
     * Display a listing of the resource.
     *
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return Response
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

    public function getModel()
    {
        return $this->model;
    }

    protected abstract function process($model, $data);
}