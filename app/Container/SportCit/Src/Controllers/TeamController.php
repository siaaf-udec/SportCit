<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Container\Overall\Src\Facades\AjaxResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Container\SportCit\Src\Interfaces\TeamInterface;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;

class TeamController extends Controller
{
    protected $teamRepository;
    protected $organizationRepository;

    public function __construct(TeamInterface $teamRepository,OrganizationInterface $organizationRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->organizationRepository = $organizationRepository;
    }

    public function index_ajax(Request $request, $id)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            return view('sportcit.team.content-ajax.ajax-team', ['organization' => $id]);
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request, $id)
    {
        $team = $this->organizationRepository->show($id,['teamOrganization']);
        $table = [];
        foreach ($team->teamOrganization as $teams){
            $table[] =[
                'id' => $teams->id,
                'name_team' => $teams->name,
                'city' => $teams->city,
                'season' => $teams->season,
                'num_player' => $teams->num_players_team
            ];
        }
        return DataTables::of($table)
            ->addIndexColumn()
            ->make(true);
    }
}