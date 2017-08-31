<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Container\Overall\Src\Facades\AjaxResponse;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use App\Container\SportCit\Src\Interfaces\PlayerInterface;
use App\Container\Users\Src\Interfaces\UserInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

class PlayerController extends Controller
{

    protected $playerInterface;
    protected $organizationInterface;
    protected $userInterface;


    public function __construct(PlayerInterface $playerInterface, OrganizationInterface $organizationInterface, UserInterface $userInterface)
    {
        $this->playerInterface = $playerInterface;
        $this->organizationInterface = $organizationInterface;
        $this->userInterface = $userInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_ajax(Request $request, $id)
    {
        if($request->ajax() && $request->isMethod('GET')){


            $organization = $this->organizationInterface->show($id, [
                'playersOrganization' => function($query){
                   return $query->where('user', '==', function ($query){

                   });
                }
            ]);

            return $organization;
            return view('sportcit.player.content-ajax.ajax-player');
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
            $organization = $this->organizationInterface->show($id, ['playersOrganization', 'userOrganization']);
            return Datatables::of($organization->userOrganization)
                ->removeColumn('identity_type')
                ->removeColumn('identity_no')
                ->removeColumn('identity_expe_place')
                ->removeColumn('identity_expe_date')
                ->removeColumn('address')
                ->removeColumn('phone')
                ->removeColumn('website')
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
    public function edit($id)
    {
        //
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
