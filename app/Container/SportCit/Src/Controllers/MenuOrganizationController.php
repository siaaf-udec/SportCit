<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Container\Overall\Src\Facades\AjaxResponse;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if($request->ajax() && $request->isMethod('GET') ){
            $organization = $this->organizationRepository->show($id,[]);
            return view('sportcit.organization.menu-organization',[
                'organization' => $organization
            ]);
        }else{
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
    }


}
