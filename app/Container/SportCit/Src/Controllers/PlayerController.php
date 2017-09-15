<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

use App\Container\Overall\Src\Facades\AjaxResponse;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use App\Container\SportCit\Src\Interfaces\PlayerInterface;
use App\Container\Users\Src\Interfaces\UserInterface;

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
    public function index_ajax(Request $request, $id)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            return view('sportcit.player.content-ajax.ajax-player', [
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
            $organization = $this->organizationInterface
                ->show($id, ['players' => function ($query) {
                    return $query->select('fk_organization_id', 'fk_user_id', 'fk_cate_player_id', 'id', 'state')
                        ->with(['user' => function ($query) {
                            return $query->select('id', 'name', 'lastname', 'email');
                        }, 'category' => function ($query) {
                            return $query->select('id', 'name');
                        }]);
                }
                ]);
            return DataTables::of($organization->players)
                ->addColumn('state', function ($query) {
                    if (!strcmp($query->state, 'Activo')) {
                        return "<span class='label label-sm label-success'>" . $query->state . "</span>";
                    }
                    return "<span class='label label-sm label-danger'>" . $query->state . "</span>";
                })
                ->rawColumns(['state'])
                ->removeColumn('fk_organization_id')
                ->removeColumn('fk_cate_player_id')
                ->removeColumn('name_organization')
                ->removeColumn('nit')
                ->removeColumn('address_organization')
                ->removeColumn('phone_organization')
                ->removeColumn('fundation')
                ->removeColumn('club_colors')
                ->removeColumn('link_organization')
                ->removeColumn('state_organization')
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->removeColumn('deleted_at')
                ->removeColumn('fk_user_id')
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
