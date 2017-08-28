<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Container\Overall\Src\Facades\AjaxResponse;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoryPlayerController extends Controller
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
    public function index_ajax(Request $request, $id)
    {
        if($request->ajax() && $request->isMethod('GET')){
            $organization = $this->organizationRepository->show($id, []);
            return $organization;
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
