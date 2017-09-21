<?php

namespace App\Container\SportCit\Src\Controllers;

use App\Container\Overall\Src\Facades\AjaxResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Container\SportCit\Src\Interfaces\TestInterface;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Fields\FormField;

class TestController extends Controller
{
    protected $testRepository;
    protected $organizationRepository;

    public function __construct(TestInterface $testRepository, OrganizationInterface $organizationRepository)
    {
        $this->testRepository = $testRepository;
        $this->organizationRepository = $organizationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sportcit.test.test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,FormBuilder $formBuilder)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            $form = $formBuilder->create('App\Forms\SongForm', [
                'id' => 'form_create_test',
                'class' => 'form-horizontal col-md-4 col-md-offset-4',
                'url' => '/forms'
            ]);
            return view('sportcit.test.content-ajax.ajax-create-test',compact('form'));
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }
}