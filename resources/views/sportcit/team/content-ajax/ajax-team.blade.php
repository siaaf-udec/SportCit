<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Equipos'])

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
                @component('themes.bootstrap.elements.tables.datatables', ['id' => 'example-table-ajax'])
                    @slot('columns', [
                        '#' => ['style' => 'width:20px;'],
                        'Nombre',
                        'Temporada',
                        'Ciudad',
                        'Jugadores',
                        'Acciones' => ['style' => 'width:90px;']
                    ])
                @endcomponent
            </div>
        </div>
        <div class="clearfix"></div>
    @endcomponent
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        /*
         * Referencia https://datatables.net/reference/option/
         */
        var $table = $('#example-table-ajax'),
            id_show = $('input[name="id_organization"]').val(),
            url = route('organization.team.data', id_show),
            columns = [
                {data: 'id', "visible": false},
                {data: 'name_team', name: 'name_team'},
                {data: 'season', name: 'season'},
                {data: 'city', name: 'city'},
                {data: 'num_player', name: 'num_player'},
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

        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
            var id_edit = $('input[name="id_organization"]').val(),
                route_edit = route('organization.menu.index', id_edit);
            $(".content-ajax").load(route_edit);
        });
    });
</script>