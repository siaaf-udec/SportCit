<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Datatable Ajax'])

        @slot('actions', [

            'link_cancel' => [
                'link' => '',
                'icon' => 'fa fa-chevron-left',
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
                    <a href="javascript:;" class="btn btn-simple btn-success btn-icon create"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                {!! Field::hidden('id_organization', $organization->id) !!}
                @component('themes.bootstrap.elements.tables.datatables', ['id' => 'example-table-ajax'])
                    @slot('columns', [
                        '#' => ['style' => 'width:20px;'],
                        'id',
                        'Nombre',
                        'Descripción',
                        'Genero',
                        'Fecha Incial' => ['class' => 'none'],
                        'Fecha Final' => ['class' => 'none'],
                        'Estado de Categoria' => ['class' => 'none'],
                        'Cupo'  => ['class' => 'none'],
                        'Acciones' => ['style' => 'width:90px;']
                    ])
                @endcomponent
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="modal-edit-category-player" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            {!! Form::open(['id' => 'from_categoty_player_update', 'class' => '', 'url' => '/forms']) !!}
                            <div class="modal-header modal-header-success">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h1><i class="glyphicon glyphicon-thumbs-up"></i> Modificar Categoria</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Field::hidden('id_edit') !!}
                                        {!! Field::text(
                                            'name_edit',
                                            ['label' => 'Nombre', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                            ['help' => 'Ingrese el Nombre']) !!}
                                        {!! Field::select(
                                            'state_category_edit',
                                            ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], null,
                                            [ 'label' => 'Estado']) !!}
                                        {!! Field::select(
                                            'gender_edit',
                                            ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null,
                                            [ 'label' => 'Genero']) !!}
                                        {!! Field::text(
                                            'space_edit',
                                            ['label' => 'Cupos', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                            ['help' => 'Ingrese el numero de cupos']) !!}
                                        {!! Field::date(
                                            'starting_year_edit',
                                            ['label' => 'Fecha de Incio', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                            ['help' => 'Digite su fecha de inicio', 'icon' => 'fa fa-calendar']) !!}
                                        {!! Field::date(
                                            'final_year_edit',
                                            ['label' => 'Fecha de Fin', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                            ['help' => 'Digite su fecha final', 'icon' => 'fa fa-calendar']) !!}
                                        {!! Field::textarea(
                                            'description_edit',
                                            ['label' => 'Descripción', 'max' => '100', 'min' => '2', 'auto' => 'off', 'rows' => '4'],
                                            ['help' => 'Ingrese la Descripción']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {!! Form::submit('Guardar', ['class' => 'btn blue']) !!}
                                {!! Form::button('Cancelar', ['class' => 'btn red', 'data-dismiss' => 'modal' ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="modal-create-category-player" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            {!! Form::open(['id' => 'from_category_player_create', 'class' => '', 'url' => '/forms']) !!}
                            <div class="modal-header modal-header-success">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h1><i class="glyphicon glyphicon-thumbs-up"></i> Crear Permiso</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Field::text(
                                            'name_create',
                                            ['label' => 'Nombre', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                            ['help' => 'Ingrese el Nombre']) !!}
                                        {!! Field::select(
                                            'state_category_create',
                                            ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], null,
                                            [ 'label' => 'Estado']) !!}
                                        {!! Field::select(
                                            'gender_create',
                                            ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null,
                                            [ 'label' => 'Genero']) !!}
                                        {!! Field::text(
                                            'space_create',
                                            ['label' => 'Cupos', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                            ['help' => 'Ingrese el numero de cupos']) !!}
                                        {!! Field::date(
                                            'starting_year_create',
                                            ['label' => 'Fecha de Incio', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                            ['help' => 'Digite su fecha de inicio', 'icon' => 'fa fa-calendar']) !!}
                                        {!! Field::date(
                                            'final_year_create',
                                            ['label' => 'Fecha de Fin', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                            ['help' => 'Digite su fecha final', 'icon' => 'fa fa-calendar']) !!}
                                        {!! Field::textarea(
                                            'description_create',
                                            ['label' => 'Descripción', 'max' => '100', 'min' => '2', 'auto' => 'off', 'rows' => '4'],
                                            ['help' => 'Ingrese la Descripción']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {!! Form::submit('Guardar', ['class' => 'btn blue']) !!}
                                {!! Form::button('Cancelar', ['class' => 'btn red', 'data-dismiss' => 'modal' ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcomponent
</div>

<script src="{{ asset('assets/main/scripts/form-validation-md.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        /*
         * Referencia https://datatables.net/reference/option/
         */
        var $table = $('#example-table-ajax'),
            id_show = $('input[name="id_organization"]').val(),
            url = route('organization.category.data', id_show),
            columns = [
                {data: 'DT_Row_Index'},
                {data: 'id', "visible": false},
                {data: 'name', name: 'Nombre'},
                {data: 'description', name: 'Descripción'},
                {data: 'gender', name: 'Genero'},
                {data: 'starting_year', name: 'Fecha Incial'},
                {data: 'final_year', name: 'Fecha Final'},
                {data: 'state_category', name: 'Estado de Categoria'},
                {data: 'space', name: 'Cupo'},
                {
                    defaultContent: '<a href="javascript:;" class="btn btn-simple btn-warning btn-icon edit"><i class="icon-pencil"></i></a><a href="javascript:;" class="btn btn-simple btn-danger btn-icon remove"><i class="icon-trash"></i></a>',
                    data: 'action',
                    name: 'action',
                    title: 'Acciones',
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

        $table = $table.DataTable();
        $table.on('click', '.remove', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var dataTable = $table.row($tr).data();

            var route_delete = route('organization.category.destroy', dataTable.id);
            var type = 'DELETE';
            var async = async || false;

            $.ajax({
                url: route_delete,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                cache: false,
                type: type,
                contentType: false,
                processData: false,
                async: async,
                beforeSend: function () {

                },
                success: function (response, xhr, request) {
                    if (request.status === 200 && xhr === 'success') {
                        $table.ajax.reload();
                        UIToastr.init(xhr, response.title, response.message);
                    }
                },
                error: function (response, xhr, request) {
                    if (request.status === 422 && xhr === 'success') {
                        UIToastr.init(xhr, response.title, response.message);
                    }
                }
            });


        });

        $table.on('click', '.edit', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');

            var dataTable = $table.row($tr).data(),
                route_edit = route('organization.category.edit', dataTable.id);

            $.get(route_edit, function (info) {
                $('input[name="id_edit"]').val(info.data.id);
                $('input:text[name="name_edit"]').val(info.data.name);
                $('select[name="state_category_edit"]').val(info.data.state_category);
                $('select[name="gender_edit"]').val(info.data.gender);
                $('input:text[name="space_edit"]').val(info.data.space);
                $('#starting_year_edit').val(info.data.starting_year);
                $('#final_year_edit').val(info.data.final_year);
                $('textarea[name="description_edit"]').val(info.data.description);
                $('#modal-edit-category-player').modal('toggle');
            });


        });

        $(".create").on('click', function (e) {
            e.preventDefault();
            $('#modal-create-category-player').modal('toggle');
        });

        /*Editar Categoria*/
        var updateCategory = function () {
            return {
                init: function () {
                    var id_edit = $('input[name="id_edit"]').val(),
                        route_update = route('organization.category.update'),
                        type = 'POST',
                        async = async || false;

                    var formData = new FormData();
                    formData.append('id', id_edit);
                    formData.append('name', $('input:text[name="name_edit"]').val());
                    formData.append('description', $('textarea[name="description_edit"]').val());
                    formData.append('gender', $('select[name="gender_edit"]').val());
                    formData.append('starting_year', $('#starting_year_edit').val());
                    formData.append('final_year', $('#final_year_edit').val());
                    formData.append('state_category', $('select[name="state_category_edit"]').val());
                    formData.append('space', $('input:text[name="space_edit"]').val());
                    formData.append('fk_organization_id', $('input[name="id_organization"]').val());

                    $.ajax({
                        url: route_update,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache: false,
                        type: type,
                        contentType: false,
                        data: formData,
                        processData: false,
                        async: async,
                        beforeSend: function () {

                        },
                        success: function (response, xhr, request) {
                            if (request.status === 200 && xhr === 'success') {
                                $table.ajax.reload();
                                $('#modal-edit-category-player').modal('hide');
                                $('#from_categoty_player_update')[0].reset(); //Limpia formulario
                                UIToastr.init(xhr, response.title, response.message);
                            }
                        },
                        error: function (response, xhr, request) {
                            if (request.status === 422 && xhr === 'success') {
                                UIToastr.init(xhr, response.title, response.message);
                            }
                        }
                    });
                }
            }
        };
        /*Crear Permissions*/
        var createCategory = function () {
            return {
                init: function () {
                    var route_create = route('organization.category.store'),
                        type = 'POST',
                        async = async || false;

                    var formData = new FormData();
                    formData.append('fk_organization_id', $('input[name="id_organization"]').val());
                    formData.append('name', $('input:text[name="name_create"]').val());
                    formData.append('description', $('textarea[name="description_create"]').val());
                    formData.append('gender', $('select[name="gender_create"]').val());
                    formData.append('starting_year', $('#starting_year_create').val());
                    formData.append('final_year', $('#final_year_create').val());
                    formData.append('state_category', $('select[name="state_category_create"]').val());
                    formData.append('space', $('input:text[name="space_create"]').val());

                    $.ajax({
                        url: route_create,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache: false,
                        type: type,
                        contentType: false,
                        data: formData,
                        processData: false,
                        async: async,
                        beforeSend: function () {

                        },
                        success: function (response, xhr, request) {
                            if (request.status === 200 && xhr === 'success') {
                                $table.ajax.reload();
                                $('#modal-create-category-player').modal('hide');
                                $('#from_category_player_create')[0].reset(); //Limpia formulario
                                UIToastr.init(xhr, response.title, response.message);
                            }
                        },
                        error: function (response, xhr, request) {
                            if (request.status === 422 && xhr === 'success') {
                                UIToastr.init(xhr, response.title, response.message);
                            }
                        }
                    });
                }
            }
        };

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

        /*Configuracion de input tipo fecha*/
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            orientation: "left",
            autoclose: true,
            regional: 'es',
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yyyy-mm-dd',
            firstDay: 1,
            showMonthAfterYear: false,
            yearSuffix: ''
        });


        var form_edit = $('#from_categoty_player_update');
        var rules_edit = {
            name_edit: {minlength: 5, required: true},
            state_category_edit: {required: true},
            gender_edit: {required: true},
            space_edit: {number: true, required: true},
            starting_year_edit: {required: true},
            final_year_edit: {required: true},
            description_edit: {minlength: 5}
        };
        FormValidationMd.init(form_edit, rules_edit, false, updateCategory());

        var form_create = $('#from_category_player_create');
        var rules_create = {
            name_create: {minlength: 5, required: true},
            state_category_create: {required: true},
            gender_create: {required: true},
            space_create: {number: true, required: true},
            starting_year_create: {required: true},
            final_year_create: {required: true},
            description_create: {minlength: 5}
        };
        FormValidationMd.init(form_create, rules_create, false, createCategory());

        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
            var id_edit = $('input[name="id_organization"]').val(),
                route_edit = route('organization.menu.index', id_edit);
            $(".content-ajax").load(route_edit);
        });
    });
</script>
