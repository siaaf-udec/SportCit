<?php

namespace App\Container\SportCit\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Container\Overall\Src\Facades\AjaxResponse;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;

class MenuOrganizationController extends Controller
{

    protected $organizationRepository;

    public function __construct(OrganizationInterface $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            $organizations = $this->organizationRepository->show($id, []);
            $temp = -3;
            foreach (json_decode($organizations) as $organization) {
                ($organization) ? $temp += 1 : '';
            }
            $temp = round(($temp * 100) / 10);

            return view('sportcit.organization.content-ajax.ajax-menu-organization', [
                'organization' => ['data' => $organizations, 'count' => $temp]
            ]);
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }


}
