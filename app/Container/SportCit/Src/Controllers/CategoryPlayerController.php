<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Container\Overall\Src\Facades\AjaxResponse;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use App\Container\SportCit\Src\Repository\CategoryPlayerRepository;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class CategoryPlayerController extends Controller
{

    protected $organizationRepository;
    protected $categoryPlayerRepository;

    public function __construct(OrganizationInterface $organizationRepository, CategoryPlayerRepository $categoryPlayerRepository)
    {
        $this->organizationRepository = $organizationRepository;
        $this->categoryPlayerRepository = $categoryPlayerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_ajax(Request $request, $id)
    {
        if($request->ajax() && $request->isMethod('GET')){
            return view('sportcit.category-player.content-ajax.ajax-category-player', [
                'organization' => $id
            ]);
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request, $id)
    {
        if($request->ajax() && $request->isMethod('GET')){
            $organization = $this->organizationRepository->show($id, ['categoryOrganization']);
            return Datatables::of($organization->categoryOrganization)
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->removeColumn('deleted_at')
                ->removeColumn('fk_organization_id')
                ->addIndexColumn()
                ->make(true);
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax() && $request->isMethod('POST')){
            $this->categoryPlayerRepository->store($request->all());
            return AjaxResponse::success(
                '¡Bien hecho!',
                'Datos modificados correctamente.'
            );
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->ajax() && $request->isMethod('GET')){
            $category = $this->categoryPlayerRepository->show($id);
            return AjaxResponse::success(
                '¡Bien hecho!',
                'Datos cargados correctamente.',
                $category
            );
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request)
    {
        if($request->ajax() && $request->isMethod('POST')){
            $this->categoryPlayerRepository->update($request->all());
            return AjaxResponse::success(
                '¡Bien hecho!',
                'Datos modificados correctamente.'
            );
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax() && $request->isMethod('DELETE')){

            $this->categoryPlayerRepository->destroy($id);

            return AjaxResponse::success(
                '¡Bien hecho!',
                'Datos eliminados correctamente.'
            );
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }
}
