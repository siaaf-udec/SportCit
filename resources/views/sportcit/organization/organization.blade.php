{{--
|--------------------------------------------------------------------------
| Extends
|--------------------------------------------------------------------------
|
| Hereda los estilos y srcipts de la de la plantilla original.
| Es la base para todas las páginas que se deseen crear.
|
--}}
@extends('material.layouts.dashboard')

{{--
|--------------------------------------------------------------------------
| Styles
|--------------------------------------------------------------------------
|
| Inyecta CSS requerido ya sea por un JS o para un elemento específico
|
| @push('styles')
|
| @endpush
--}}
@push('styles')
    {--  Datatables Styles --}
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    {-- select2 Scripts --}
    <link href="{{  asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{  asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/select2material/css/pmd-select2.css') }}" rel="stylesheet" type="text/css"/>
    {-- bootstrap-toastr Scripts --}
    <link href="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
    {-- dropzone Scripts --}
    <link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css"/>
    {-- bootstrap-toastr Scripts --}
    <link href="{{asset('assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css"/>
    {-- bootstrap-toastr Scripts --}
    <link href="{{asset('assets/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css"/>
    {-- dropzone Scripts --}
    <link href="{{asset('assets/global/plugins/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/global/plugins/dropzone/basic.min.css')}}" rel="stylesheet" type="text/css"/>
    {-- bootstrap-sweetalert Scripts --}
    <link href="{{asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endpush


{{--
|--------------------------------------------------------------------------
| Title
|--------------------------------------------------------------------------
|
| Inyecta el título de la página a la etiqueta <title></title> de la plantilla
| Recibe texto o variables de los controladores
| Sin embargo, también se puede usar de la siguiente forma
|
| @section('title', $miVariable)
| @section('title', 'Título')
--}}
@section('title', '| Dashboard')

{{--
|--------------------------------------------------------------------------
| Page Title
|--------------------------------------------------------------------------
|
| Inyecta el título a la sección del contenido de página.
| Recibe texto o variables de los controladores
| Sin embargo, también se puede usar de la siguiente forma
|
| @section('page-title', $miVariable)
| @section('page-title', 'Título')
|
|
--}}
@section('page-title', 'Dashboard')
{{--
|--------------------------------------------------------------------------
| Page Description
|--------------------------------------------------------------------------
|
| Inyecta una breve descripción a la sección del contenido de página.
| Recibe texto o variables de los controladores o se puede dejar sin datos
| Sin embargo, también se puede usar de la siguiente forma
|
| @section('page-description', $miVariable)
| @section('page-description', 'Título')
--}}

@section('page-description', 'Organizaciones')

{{--
|--------------------------------------------------------------------------
| Content
|--------------------------------------------------------------------------
|
| Inyecta el contenido HTML que se usará en la página
|
| @section('content')
|
| @endsection
--}}
@section('content')
    <div class="col-md-12">
        @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Datatable Ajax'])

            @slot('actions', [

                'link_upload' => [
                    'link' => '',
                    'icon' => 'icon-cloud-upload',
                ],
                'link_wrench' => [
                    'link' => '',
                    'icon' => 'icon-wrench',
                ],
                'link_trash' => [
                    'link' => '',
                    'icon' => 'icon-trash',
                ],

            ])
            <div class="clearfix"></div><br><br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="actions">
                        <a href="javascript:;" class="btn btn-simple btn-success btn-icon create"><i
                                    class="fa fa-plus"></i></a></div>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="col-md-12">
                    @component('themes.bootstrap.elements.tables.datatables', ['id' => 'organization-table-ajax'])
                        @slot('columns', [
                            '#' => ['style' => 'width:20px;'],
                            'User',
                            'Nombre',
                            'Nit',
                            'Estado'=> ['style' => 'width:80px;'],
                            'Admisión'=> ['style' => 'width:80px;'],
                            'Legalidad' => ['style' => 'width:80px;'],
                            'Acciones' => ['style' => 'width:90px;']
                        ])
                    @endcomponent
                </div>
            </div>
        @endcomponent
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Modal -->
            <div id="Modal-viewpdf" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Documento de Legalidad</h4>
                        </div>
                        <div class="modal-body text-center body-viewpdf" id="texto">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-primary btn-center" data-dismiss="modal">
                                Cerrar
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal -->
            <!-- Modal -->
            <div class="modal fade" id="Modal-state" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        {!! Form::open(['id' => 'from_mesanje_state', 'class' => '', 'url' => '/forms']) !!}
                        <div class="modal-header modal-header-success">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h1><i class="glyphicon glyphicon-thumbs-up"></i> Estado de la Organización</h1>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Field::hidden('id_user') !!}
                                    {!! Field::hidden('id_organization') !!}
                                    {!! Field::select(
                                                    'type_state',
                                                    ['Aprobado' => 'Aprobado', 'Denegado' => 'Denegado'],null,
                                                    ['required','icon' => 'fa fa-hand-pointer-o','label' => 'Estado' , 'autofocus', 'auto' => 'off']) !!}
                                    {!! Field::textarea(
                                        'mesanje_state',
                                        ['label' => 'Motivos', 'max' => '300', 'min' => '2', 'auto' => 'off'],
                                        ['icon' => 'fa fa-envelope','help' => 'Ingrese los motivos del estado']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Guardar', ['class' => 'btn blue up_state']) !!}
                            {!! Form::button('Cancelar', ['class' => 'btn red', 'data-dismiss' => 'modal' ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Inyecta scripts necesarios para usar plugins
| > Tablas
| > Checkboxes
| > Radios
| > Mapas
| > Notificaciones
| > Validaciones de Formularios por JS
| > Entre otros
| @push('functions')
|
| @endpush
--}}

@push('plugins')
    {-- Datatables Scripts --}
    <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    {-- jquery-validation Scripts --}
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/localization/messages_es.js') }}" type="text/javascript"></script>
    {-- select2 Scripts --}
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    {-- wizard Scripts --}
    <script src="{{ asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
    {-- bootstrap-toastr Scripts --}
    <script src="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
    {-- bootstrap-datepicker Scripts --}
    <script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    {-- bootstrap-maxlength Scripts --}
    <script src="{{ asset('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
    {-- bootstrap-colorpicker Scripts --}
    <script src="{{asset('assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}" type="text/javascript"></script>
    {-- jquery-minicolors Scripts --}
    <script src="{{ asset('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js') }}" type="text/javascript"></script>
    {-- bootstrap-sweetalert Scripts --}
    <script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    {-- dropzone Scripts --}
    <script src="{{ asset('assets/global/plugins/dropzone/dropzone.min.js') }}" type="text/javascript"></script>
    {-- jquery-media Scripts --}
    <script src="{{ asset('assets/global/plugins/jquery-media/jquery.media.js') }}" type="text/javascript"></script>
    {-- bootstrap-datepicker Scripts --}
    <script src="{{ asset('assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
@endpush


{{--
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Inyecta scripts para inicializar componentes Javascript como
| > Tablas
| > Checkboxes
| > Radios
| > Mapas
| > Notificaciones
| > Validaciones de Formularios por JS
| > Entre otros
| @push('functions')
|
| @endpush
--}}
@push('functions')
    {-- bootstrap-toastr Scripts --}
    <script src="{{ asset('assets/main/scripts/ui-toastr.js') }}" type="text/javascript"></script>
    {-- bootstrap-toastr Scripts --}
    <script src="{{ asset('assets/main/scripts/table-datatable.js') }}" type="text/javascript"></script>
    {-- bootstrap-toastr Scripts --}
    <script src="{{ asset('assets/main/scripts/ui-sweetalert.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        jQuery(document).ready(function () {
            App.unblockUI();
            /*
             * Referencia https://datatables.net/reference/option/
             */
            var $table = $('#organization-table-ajax'),
                url = route('organization.data'),
                columns = [
                    {data: 'id', name: 'id', "visible": false},
                    {data: 'fk_user_id', name: 'fk_user_id', "visible": false, searchable: false,},
                    {data: 'name_organization', name: 'name_organization'},
                    {data: 'nit', name: 'nit'},
                    {data: 'state_organization', name: 'state_organization'},
                    {
                        defaultContent: '<a href="javascript:;" class="btn btn-simple btn-default btn-icon btn-center state"><i class="fa fa-handshake-o"></i></a>',
                        data: 'admision',
                        name: 'admision',
                        orderable: false,
                        searchable: false,
                        exportable: false,
                        printable: false,
                        className: 'text-right',
                        render: null,
                        responsivePriority: 2
                    },
                    {
                        defaultContent: '<a href="javascript:;" class="btn btn-simple btn-info btn-icon btn-center viewfile"><i class="fa fa-file-pdf-o"></i></a>',
                        data: 'archivo',
                        name: 'archivo',
                        orderable: false,
                        searchable: false,
                        exportable: false,
                        printable: false,
                        className: 'text-right',
                        render: null,
                        responsivePriority: 2
                    },
                    {
                        defaultContent: '<a href="javascript:;" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-bars"></i></a><a href="javascript:;" class="btn btn-simple btn-danger btn-icon mt-sweetalert remove"><i class="icon-trash"></i></a>',
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        exportable: false,
                        printable: false,
                        className: 'text-right',
                        render: null,
                        responsivePriority: 2
                    }
                ];
            dataTableServer.init($table, url, columns);

            $(".create").on('click', function (e) {
                e.preventDefault();
                var route_create = route('organization.create');
                $(".content-ajax").load(route_create);
            });
            $table = $table.DataTable();

            $table.on('click', '.state', function (e) {
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = $table.row($tr).data();
                document.getElementById("from_mesanje_state").reset();
                $('input[name="id_user"]').val(dataTable.fk_user_id);
                $('input[name="id_organization"]').val(dataTable.id);
                $("#Modal-state").modal();
                //$(".content-ajax").load(route_edit);
            });

            $(".up_state").on('click', function (e) {
                e.preventDefault();
                var id = $('input[name="id_organization"]').val();
                var formData = new FormData();
                formData.append('state_organization', $('select[name="type_state"]').val());
                formData.append('id', $('select[name="id_organization"]').val());
                formData.append('user_id', $('input[name="id_user"]').val());
                var route_state = route('organization.update_state', id);
                var type = 'POST';
                var async = async || false;
                App.blockUI();
                $.ajax({
                    url: route_state,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    type: type,
                    contentType: false,
                    data: formData,
                    processData: false,
                    async: async,
                    success: function (response, xhr, request) {
                        if (request.status === 200 && xhr === 'success') {
                            UIToastr.init(xhr, response.title, response.message);
                            route_index = route('organization.index.ajax');
                            $(".content-ajax").load(route_index);
                        }
                    },
                    error: function (response, xhr, request) {
                        if (request.status === 422 && xhr === 'error') {
                            UIToastr.init(xhr, response.title, response.message);
                            App.unblockUI();
                        }
                    }
                });
            });

            $table.on('click', '.edit', function (e) {
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = $table.row($tr).data(),
                    route_edit = route('organization.menu.index', dataTable.id);

                $(".content-ajax").load(route_edit);
            });

            $table.on('click', '.remove', function (e) {
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = $table.row($tr).data(),
                    route_remove = route('organization.destroy', dataTable.id);
                var title = 'Eliminar';
                var organization = dataTable.name_organization;
                var text = 'Esta seguro de eliminar la organización: ' + organization;
                var type = 'warning';
                var formData = new FormData();
                formData.append('state', dataTable.state_organization);
                formData.append('id_user', dataTable.fk_user_id);
                SweetAlert.init(title, text, type, route_remove, formData);

            });

            $table.on('click', '.viewfile', function (e) {
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = $table.row($tr).data(),
                    route_file = route('organization.viewfile', dataTable.id);
                type = 'GET';
                var async = async || false;
                $.ajax({
                    url: route_file,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    type: type,
                    contentType: false,
                    data: 'viewfile',
                    processData: false,
                    async: async,
                    success: function (response, xhr, request) {
                        if (request.status === 200 && xhr === 'success') {
                            document.getElementById('texto').innerHTML = '';
                            $('.body-viewpdf').prepend('<center><a class="media" href=' + response.message + '>Legalidad</a></center>');
                            $("#Modal-viewpdf").modal();
                            $('a.media').media({width: 500, height: 400});
                        }
                    },
                    error: function (response, xhr, request) {
                        if (request.status === 422 && xhr === 'error') {
                            UIToastr.init(xhr, response.title, response.message);
                        }
                    }
                });
            });

            /*Configuracion de Select*/
            $.fn.select2.defaults.set("theme", "bootstrap");
            $(".pmd-select2").select2({
                placeholder: "Selecccionar",
                allowClear: true,
                width: 'auto',
                escapeMarkup: function (m) {
                    return m;
                }
            });

        });
    </script>
@endpush
