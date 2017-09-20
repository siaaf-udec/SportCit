<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Jugadores'])

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
                {!! Field::hidden('id_organization', $organization) !!}
                @component('themes.bootstrap.elements.tables.datatables', ['id' => 'players-table-ajax'])
                    @slot('columns', [
                        '#' => ['style' => 'width:20px;'],
                        'id',
                        'Nombre',
                        'Correo Electronico',
                        'Categoria',
                        'Estado',
                        'Acciones' => ['style' => 'width:90px;']
                    ])
                @endcomponent
            </div>
        </div>
        <div class="clearfix"></div>
    @endcomponent
</div>

{{-- jquery-validation Scripts --}}
<script src="{{ asset('assets/main/scripts/form-validation-md.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        /*
         * Referencia https://datatables.net/reference/option/
         */
        var $table = $('#players-table-ajax'),
            $id_show = $('input[name="id_organization"]').val(),
            url = route('organization.player.data', $id_show),
            columns = [
                {data: 'DT_Row_Index'},
                {data: 'id', "visible": false},
                {data: function (data, type, dataToSet) {
                    return data.user.name + " " + data.user.name;
                }, name: 'Nombre'},
                {data: 'user.email', name: 'Nombre'},
                {data: 'category.name', name: 'Nombre'},
                {data: 'state', name: 'Nombre'},
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

        $(".create").on('click', function (e) {
            e.preventDefault();
            var route_create = route('organization.player.create',{id: $id_show});
            $(".content-ajax").load(route_create);
        });

        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
             var route_edit = route('organization.menu.index', $id_show);
            $(".content-ajax").load(route_edit);
        });
    });
</script>
