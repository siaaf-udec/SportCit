<?php

namespace App\Container\Overall\Src\Interfaces;

interface ControllerInterface
{

    /**
     * Display a listing of the resource.
     *
     * @param $array
     * @return \Illuminate\Http\Response
     */
    public function index($array);

    /**
     * Store a newly created resource in storage.
     *
     * @param $array
     * @return \Illuminate\Http\Response
     * @internal param \Illuminate\Http\Request $request
     */
    public function store($array);

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param $relations
     * @return \Illuminate\Http\Response
     */
    public function show($id, $relations);

    /**
     * Update the specified resource in storage.
     *
     * @param $data
     * @return \Illuminate\Http\Response
     * @internal param \Illuminate\Http\Request $request
     * @internal param int $id
     */
    public function update($data);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id);

}