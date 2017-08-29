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
            $organization = $this->organizationRepository->show($id, []);

            return view('sportcit.category-player.content-ajax.ajax-category-player', [
                'organization' => $organization
            ]);
        }else{
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
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

        $organization = $this->organizationRepository->show($id, ['categoryOrganization']);

        return Datatables::of($organization->categoryOrganization)
            ->removeColumn('created_at')
            ->removeColumn('updated_at')
            ->removeColumn('deleted_at')
            ->removeColumn('fk_organization_id')
            ->addIndexColumn()
            ->make(true);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:15',
        ]);
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
        }else{
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
