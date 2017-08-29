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
        <div class="clearfix"> </div><br><br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="actions">
                    <a href="javascript:;" class="btn btn-simple btn-success btn-icon create"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="clearfix"> </div><br>
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
                <div class="modal fade" id="modal-create-category-player" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            {!! Form::open(['id' => 'from_permissions_update', 'class' => '', 'url' => '/forms']) !!}
                                <div class="modal-header modal-header-success">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h1><i class="glyphicon glyphicon-thumbs-up"></i> Modificar Permiso</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Field::hidden('id_create') !!}
                                            {!! Field::text(
                                                'name_edit',
                                                ['label' => 'Nombre', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                                ['help' => 'Ingrese el Nombre', 'icon' => 'fa fa-user']) !!}
                                            {!! Field::select(
                                                 'state_category_create',
                                                 ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],null,
                                                 [ 'label' => 'Estado']) !!}
                                            {!! Field::select(
                                                'gender_create',
                                                ['Femenino' => 'Femenino', 'Masculino' => 'Masculino'],null,
                                                [ 'label' => 'Genero']) !!}
                                            {!! Field::text(
                                                'space_create',
                                                ['label' => 'Nombre', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                                ['help' => 'Ingrese el Nombre', 'icon' => 'fa fa-user']) !!}
                                            {!! Field::date(
                                                'starting_year_create',
                                                ['label' => 'Fecha de Expedición', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                                ['help' => 'Digite su fecha de expedición', 'icon' => 'fa fa-calendar']) !!}
                                            {!! Field::date(
                                                'final_year_create',
                                                ['label' => 'Fecha de Expedición', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                                ['help' => 'Digite su fecha de expedición', 'icon' => 'fa fa-calendar']) !!}
                                            {!! Field::textarea(
                                                'description_edit',
                                                ['label' => 'Descripción', 'max' => '100', 'min' => '2', 'auto' => 'off'],
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
                <div class="modal fade" id="modal-create-permission" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            {!! Form::open(['id' => 'from_permissions_create', 'class' => '', 'url' => '/forms']) !!}
                            <div class="modal-header modal-header-success">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h1><i class="glyphicon glyphicon-thumbs-up"></i> Crear Permiso</h1>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Field::select(
                                            'Modulo',
                                            ['name' => 'module_create']) !!}
                                        {!! Field::text(
                                            'name_create',
                                            ['label' => 'Nombre', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                            ['help' => 'Ingrese el Nombre', 'icon' => 'fa fa-user']) !!}
                                        {!! Field::text(
                                            'display_name_create',
                                            ['label' => 'Nombre para Mostrar', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                            ['help' => 'Ingrese el Nombre para Mostrar', 'icon' => 'fa fa-user']) !!}
                                        {!! Field::textarea(
                                            'description_create',
                                            ['label' => 'Descripción', 'max' => '100', 'min' => '2', 'auto' => 'off'],
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

<script type="text/javascript">
    jQuery(document).ready(function () {
        /*
         * Referencia https://datatables.net/reference/option/
         */
        var table, url, columns, id_show;
        id_show =  $('input[name="id_organization"]').val();
        table = $('#example-table-ajax');
        url = route('organization.category.data', id_show);
        columns = [
            {data: 'DT_Row_Index'},
            {data: 'id', "visible": false },
            {data: 'name', name: 'Nombre'},
            {data: 'description', name: 'Descripción'},
            {data: 'gender', name: 'Genero'},
            {data: 'starting-year', name: 'Fecha Incial'},
            {data: 'final-year', name: 'Fecha Final'},
            {data: 'state_category', name: 'Estado de Categoria'},
            {data: 'space', name: 'Cupo'},
            {
                defaultContent: '<a href="javascript:;" class="btn btn-simple btn-warning btn-icon edit"><i class="icon-pencil"></i></a><a href="javascript:;" class="btn btn-simple btn-danger btn-icon remove"><i class="icon-trash"></i></a>',
                data:'action',
                name:'action',
                title:'Acciones',
                orderable: false,
                searchable: false,
                exportable: false,
                printable: false,
                className: 'text-right',
                render: null,
                responsivePriority:2
            }
        ];
        dataTableServer.init(table, url, columns);

        table = table.DataTable();
        table.on('click', '.remove', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var dataTable = table.row($tr).data();

            var route = '{{ route('permissions.destroy') }}'+'/'+dataTable.id;
            var type = 'DELETE';
            var async = async || false;

            $.ajax({
                url: route,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                cache: false,
                type: type,
                contentType: false,
                processData: false,
                async: async,
                beforeSend: function () {

                },
                success: function (response, xhr, request) {
                    if (request.status === 200 && xhr === 'success') {
                        table.ajax.reload();
                        UIToastr.init(xhr , response.title , response.message  );
                    }
                },
                error: function (response, xhr, request) {
                    if (request.status === 422 &&  xhr === 'success') {
                        UIToastr.init(xhr, response.title, response.message);
                    }
                }
            });


        });
        table.on('click', '.edit', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');

            var dataTable = table.row($tr).data(),
                route_edit = '{{ route('organization.category.edit') }}'+ '/'+ dataTable.id;

            $.get( route_edit, function( info ) {
                console.log(info);
                $('#modal-create-category-player').modal('toggle');
                //$('input[name="id_edit"]').val(info.data.id);
                //$('#modal-update-permission').modal('toggle');
            });


        });

        $( ".create" ).on('click', function (e) {
            e.preventDefault();
            $('#modal-create-permission').modal('toggle');
        });

        /*Editar Permiso*/
        var updatePermissions = function () {
            return{
                init: function () {
                    var id_edit = $('input[name="id_edit"]').val();
                    var route = '{{ route('permissions.update') }}'+'/'+id_edit;
                    var type = 'POST';
                    var async = async || false;

                    var formData = new FormData();
                    formData.append('name', $('input:text[name="name_edit"]').val());
                    formData.append('display_name', $('input:text[name="display_name_edit"]').val());
                    formData.append('description', $('#description_edit').val());
                    formData.append('module_id', $('select[name="module_edit"]').val());

                    $.ajax({
                        url: route,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
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
                                table.ajax.reload();
                                $('#modal-update-permission').modal('hide');
                                $('#from_permissions_update')[0].reset(); //Limpia formulario
                                UIToastr.init(xhr , response.title , response.message  );
                            }
                        },
                        error: function (response, xhr, request) {
                            if (request.status === 422 &&  xhr === 'success') {
                                UIToastr.init(xhr, response.title, response.message);
                            }
                        }
                    });
                }
            }
        };
        /*Crear Permissions*/
        var createPermissions = function () {
            return{
                init: function () {
                    var route = '{{ route('permissions.store') }}';
                    var type = 'POST';
                    var async = async || false;

                    var formData = new FormData();
                    formData.append('name', $('input:text[name="name_create"]').val());
                    formData.append('display_name', $('input:text[name="display_name_create"]').val());
                    formData.append('description', $('#description_create').val());
                    formData.append('module_id', $('select[name="module_create"]').val());

                    $.ajax({
                        url: route,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
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
                                table.ajax.reload();
                                $('#modal-create-permission').modal('hide');
                                $('#from_permissions_create')[0].reset(); //Limpia formulario
                                UIToastr.init(xhr , response.title , response.message  );
                            }
                        },
                        error: function (response, xhr, request) {
                            if (request.status === 422 &&  xhr === 'success') {
                                UIToastr.init(xhr, response.title, response.message);
                            }
                        }
                    });
                }
            }
        };


        var form_edit = $('#from_permissions_update');
        var rules_edit = {
            name_edit: { minlength: 5, required: true },
            display_name_edit: { minlength: 5, required: true },
            description_edit: { minlength: 5 },
            module_edit: { required: true }
        };
        //FormValidationMd.init(form_edit,rules_edit,false,updatePermissions());

        var form_create = $('#from_permissions_create');
        var rules_create = {
            name_create: { minlength: 5, required: true },
            display_name_create: { minlength: 5, required: true },
            description_create: { minlength: 5 },
            module_create: { required: true }
        };
        //FormValidationMd.init(form_create,rules_create,false,createPermissions());

        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
            var id_edit = $('input[name="id_organization"]').val(),
                route_edit = route('organization.menu.index',id_show);
            $(".content-ajax").load(route_edit);
        });
    });
</script>
