<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'fa fa-file-text', 'title' => 'Test'])

        @slot('actions', [

            'link_upload' => [
                    'link' => '',
                    'icon' => 'fa fa-cloud-upload',
                ],
                'link_wrench' => [
                    'link' => '',
                    'icon' => 'fa fa-wrench',
                ],
                'link_trash' => [
                    'link' => '',
                    'icon' => 'fa fa-trash',
                ],

        ])
        <div class="clearfix"></div><br><br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="actions">
                    <a href="javascript:;" class="btn btn-simple btn-success btn-icon create"><i
                                class="fa fa-plus"></i>Nuevo Test</a></div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                @component('themes.bootstrap.elements.tables.datatables', ['id' => 'test-table-ajax'])
                    @slot('columns', [
                        '#' => ['style' => 'width:20px;'],
                        'Nombre',
                        'Estilo',
                        'Creación',
                        'Actualización',
                        'Formulario'=> ['style' => 'width:80px;'],
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
        <div id="Modal-form" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Formulario de test</h4>
                    </div>
                    <div class="modal-body text-center">
                        <div class="render-wrap"></div>
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

<script type="text/javascript">
    jQuery(document).ready(function () {
        App.unblockUI();
        /*
         * Referencia https://datatables.net/reference/option/
         */
        var $table = $('#test-table-ajax'),
            url = route('test.data'),
            columns = [
                {data: 'id', name: 'id', "visible": false},
                {data: 'name', name: 'name'},
                {data: 'style', name: 'style', "visible": false},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {
                    defaultContent: '<a href="javascript:;" class="btn btn-simple btn-default btn-icon btn-center formtest"><i class="fa fa-eye"></i></a>',
                    data: 'Formulario',
                    name: 'Formulario',
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
            var route_create = route('test.create');
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
            $("#Modal-state").modal('hide');
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

        $table.on('click', '.formtest', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var dataTable = $table.row($tr).data();

            var templates = {
                starRating: function (fieldData) {
                    return {
                        field: '<span id="' + fieldData.name + '">',
                        onRender: function () {
                            $(document.getElementById(fieldData.name)).rateYo({rating: 3.6});
                        }
                    };
                }
            };
            var datos = JSON.stringify(dataTable.style);
            $('.render-wrap').formRender({
                formData: datos,
                templates: templates
            });
            $("#Modal-form").modal();
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