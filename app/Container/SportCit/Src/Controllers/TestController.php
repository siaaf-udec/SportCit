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
use App\Container\SportCit\Src\Test;

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
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index_ajax(Request $request)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            return view('sportcit.test.content-ajax.ajax-test');
        }

        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function data(Request $request)
    {

        $test = Test::query();

        return DataTables::of($test)
            ->addColumn('style', function ($test) {
                return json_decode($test->style,true);
            })
            ->addIndexColumn()
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, FormBuilder $formBuilder)
    {
        if ($request->ajax() && $request->isMethod('GET')) {
            $form = $formBuilder->create('App\Forms\SongForm', [
                'id' => 'form_create_test',
                'class' => 'form-horizontal col-md-4 col-md-offset-4',
                'url' => '/forms'
            ]);
            return view('sportcit.test.content-ajax.ajax-create-test', compact('form'));
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
        if ($request->ajax() && $request->isMethod('POST')) {
            $this->testRepository->store($request);

            return AjaxResponse::success(
                '¡Bien hecho!',
                'Test creado correctamente.'
            );
        }
        return AjaxResponse::fail(
            '¡Lo sentimos!',
            'No se pudo completar tu solicitud.'
        );
    }
}