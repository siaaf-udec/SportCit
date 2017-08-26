<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Container\SportCit\Src\Organization;
use App\Container\SportCit\Src\Requests\OrganizationRequest;
use Yajra\Datatables\Datatables;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use Illuminate\Http\Request;
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
        return view('sportcit.organization.organization');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_ajax(Request $request)
    {
        if($request->ajax() && $request->isMethod('GET')){
            return view('sportcit.organization.content-ajax.ajax-organization');
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
    public function create(Request $request)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            return view('sportcit.organization.content-ajax.ajax-create-organization');
        } else {
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

        $organization = Organization::query();

        return Datatables::of($organization)
            ->addColumn('state_organization', function ($organization) {
                if (!strcmp($organization->state_organization, 'Aprobado')) {
                    return "<span class='label label-sm label-success'>" . $organization->state_organization . "</span>";
                } elseif (!strcmp($organization->state_organization, 'Pendiente')) {
                    return "<span class='label label-sm label-warning'>" . $organization->state_organization . "</span>";
                } else {
                    return "<span class='label label-sm label-danger'>" . $organization->state_organization . "</span>";
                }
            })
            ->rawColumns(['state_organization'])
            ->removeColumn('address_organization')
            ->removeColumn('phone_organization')
            ->removeColumn('fundation')
            ->removeColumn('club_colors')
            ->removeColumn('link_organization')
            ->removeColumn('created_at')
            ->removeColumn('updated_at')
            ->removeColumn('deleted_at')
            ->addIndexColumn()
            ->make(true);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax() && $request->isMethod('POST')) {
            //Agregar usuario
            $user = $this->userRepository->store($request->all());
            //Agregar organizacion
            $organization = $user->organizations()->create($request->all());
            //aAgregar archivos
            $archi = $request->file('file');
            foreach ($archi as $file) {
                $url = Storage::disk('sportcit')->putFile('legal', $file);
            }
            $organization->files()->create([
                'name_file' => $request['name_organization'],
                'url_file' => $url,
                'type_file' => $request['type_file'],
            ]);

            /*Guarda los Roles*/
            $roles = 2;
            $user->roles()->sync(
                ($roles !== null) ? explode(',', $roles) : []
            );

            return AjaxResponse::success(
                '¡Bien hecho!',
                'Organización creada correctamente.'
            );


        } else {
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
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
    public function edit(Request $request, $id)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            $organization = $this->organizationRepository->show($id, []);
            $archivo = $organization->files->where('type_file', 'Legalidad');
            foreach ($archivo as $url) {
                $link = Storage::url('sportcit/' . $url->url_file);
                $name_file = '/public/sportcit/' . $url->url_file;
                $name = $url->url_file;
            }
            $size = Storage::size($name_file);
            return view('sportcit.organization.content-ajax.ajax-update-organization', [
                'organization' => $organization,
                'archivo' => $link,
                'name' => $name,
                'tama' => $size
            ]);

        } else {
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax() && $request->isMethod('POST')) {
           $organization = $this->organizationRepository->update($request->all());

            if(count($request->file('file'))){
                Storage::disk('sportcit')->delete($request->name_file);
                $archi = $request->file('file');
                foreach ($archi as $file) {
                    $url = Storage::disk('sportcit')->putFile('legal', $file);
                }
                $organization->files()->update([
                    'name_file' => $request['name_organization'],
                    'url_file' => $url,
                ]);

            }
            return AjaxResponse::success(
                '¡Bien hecho!',
                'Datos modificados correctamente.'
            );

        } else {
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update_state(Request $request, $id)
    {
        if ($request->ajax() && $request->isMethod('POST')) {
            $organization = Organization::find($id);
            $user = $this->userRepository->show($request->user_id);
            if($organization->state_organization == 'Pendiente' && $request->state_organization == 'Aprobado' ){
                $user->state_user = 'Activo';
                $user->save();
            }
            $organization->state_organization = $request->state_organization;
            $organization->save();

            $email = $user->email;
            return AjaxResponse::success(
                '¡Bien hecho!',
                'Datos modificados correctamente.'
            );

        } else {
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function viewfile(Request $request, $id)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            $organization = Organization::find($id);
            $url = $organization->files->where('type_file', 'Legalidad');
            foreach ($url as $url) {
                $link = Storage::url('/sportcit/' . $url->url_file);
            }
            return AjaxResponse::success(
                '¡Bien hecho!',
                $link
            );
        } else {
            return AjaxResponse::fail(
                '¡Lo sentimos!',
                'No se pudo completar tu solicitud.'
            );
        }
    }
}
