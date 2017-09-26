<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Container\Overall\Src\Facades\AjaxResponse;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use App\Container\SportCit\Src\Interfaces\SportPlaceInterface;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;


class SportPlaceController extends Controller
{
    protected $organizationRepository;
    protected $sportPlaceRepository;

    public function __construct(OrganizationInterface $organizationRepository, SportPlaceInterface $sportPlaceRepository)
    {
        $this->organizationRepository = $organizationRepository;
        $this->sportPlaceRepository = $sportPlaceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_ajax(Request $request, $id)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            return view('sportcit.sport-place.content-ajax.ajax-sport-place', [
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
        if ($request->ajax() && $request->isMethod('GET')) {

            $organization = $this->organizationRepository
                ->show($id, ['sportPlaces' => function ($query) {
                    return $query->select('fk_organization_id' ,'id', 'name', 'description', 'state');
                }]);

            return DataTables::of($organization->sportPlaces)
                ->removeColumn('fk_organization_id')
                ->addColumn('state', function ($query) {
                    if (!strcmp($query->state, 'Activo')) {
                        return "<span class='label label-sm label-success'>" . $query->state . "</span>";
                    }
                    return "<span class='label label-sm label-danger'>" . $query->state . "</span>";
                })
                ->rawColumns(['state'])
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
     * @param  \Illuminate\Http\Request $request
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
