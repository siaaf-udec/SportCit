<?php

namespace App\Container\SportCit\Src\Controllers;

use Yajra\Datatables\Datatables;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Container\Users\Src\Interfaces\UserInterface;
use App\Container\Overall\Src\Facades\AjaxResponse;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{

    protected $userRepository;
    protected $organizationRepository;

    public function __construct(UserInterface $userRepository, OrganizationInterface $organizationRepository)
    {
        $this->userRepository = $userRepository;
        $this->organizationRepository = $organizationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sportcit.organization');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax() && $request->isMethod('GET')){
            return view('sportcit.create-organization');
        }else{
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        if($request->ajax() && $request->isMethod('GET')){
            $organization = $this->organizationRepository->index([]);
            return Datatables::of($organization)
                ->addColumn('state_organization', function ($organization){
                    if(!strcmp($organization->state_organization, 'Aprobado')){
                        return "<span class='label label-sm label-success'>".$organization->state_organization. "</span>";
                    }elseif (!strcmp($organization->state_organization, 'Pendiente')){
                        return "<span class='label label-sm label-warning'>".$organization->state_organization. "</span>";
                    }else{
                        return "<span class='label label-sm label-danger'>".$organization->state_organization. "</span>";
                    }
                })
                ->rawColumns(['state_organization'])
                ->removeColumn('address_organization')
                ->removeColumn('phone_organization')
                ->removeColumn('fundation')
                ->removeColumn('club_colors')
                ->removeColumn('link_organization')
                ->addIndexColumn()
                ->make(true);
        }else{
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax() && $request->isMethod('POST'))
        {
            //Agregar usuario
            $user = $this->userRepository->store($request->all());
            //Agregar organizacion
            $organization =  $user->organizations()->create($request->all());
            //aAgregar archivos
            $files = $request->file('file');
            foreach($files as $file){
                $url = Storage::disk('sportcit')->putFile('legal', $file);
            }
            $organization->files()->create([
                'name_file' => $request['name_organization'],
                'url_file' => $url,
                'type_file' => 'Legalidad'
            ]);

            /*Guarda los Roles*/
            $roles =  2;
            $user->roles()->sync(
                ($roles !== null) ? explode(',', $roles) : []
            );

            return AjaxResponse::success(
                '¡Bien hecho!',
                'Organización creada correctamente.'
            );
        }else{
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
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
        if($request->ajax()){
            if($request->isMethod('POST')){
               $user = [
                   'id' => $id,
                   'name'=> $request->get('name')
               ];
                $this->userRepository->update($user);
                return AjaxResponse::success(
                    '¡Bien hecho!',
                    'Datos modificados correctamente.'
                );
            }
        }else{
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
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
