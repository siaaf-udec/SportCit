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

<script type="text/javascript">

    jQuery(document).ready(function () {
        /*
         * Referencia https://datatables.net/reference/option/
         */
        var table, url, columns;
        table = $('#organization-table-ajax');
        url = "{{ route('organization.data') }}";
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
                defaultContent: '<a href="javascript:;" class="btn btn-simple btn-warning btn-icon edit"><i class="icon-pencil"></i></a><a href="javascript:;" class="btn btn-simple btn-danger btn-icon remove"><i class="icon-trash"></i></a>',
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
        dataTableServer.init(table, url, columns);

        $(".create").on('click', function (e) {
            e.preventDefault();
            var route = '{{ route('organization.create') }}';
            $(".content-ajax").load(route);
        });
        table = table.DataTable();

        table.on('click', '.state', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var dataTable = table.row($tr).data();
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
            var route = '{{ route('organization.update_state') }}'+'/'+id;
            var type = 'POST';
            var async = async || false;
            $.ajax({
                url: route,
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
                        location.reload();
                    }
                },
                error: function (response, xhr, request) {
                    if (request.status === 422 && xhr === 'error') {
                        UIToastr.init(xhr, response.title, response.message);
                    }
                }
            });
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var dataTable = table.row($tr).data(),
                route_edit = '{{ route('organization.menu.index') }}' + '/' + dataTable.id;

            $(".content-ajax").load(route_edit);
        });

        table.on('click', '.viewfile', function (e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var dataTable = table.row($tr).data(),
                route_file = '{{ route('organization.viewfile') }}' + '/' + dataTable.id;
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