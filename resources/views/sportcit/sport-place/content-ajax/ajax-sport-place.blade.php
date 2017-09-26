<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Categorias'])

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
                    <a href="javascript:;" class="btn btn-simple btn-success btn-icon create"><i class="fa fa-plus"></i>Escenario Deportivo </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-12">
                {!! Field::hidden('id_organization', $organization) !!}
                @component('themes.bootstrap.elements.tables.datatables', ['id' => 'example-table-ajax'])
                    @slot('columns', [
                        '#' => ['style' => 'width:20px;'],
                        'id',
                        'Nombre',
                        'Descripción',
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
<script type="text/javascript">
    jQuery(document).ready(function () {
        /*
         * Referencia https://datatables.net/reference/option/
         */
        var $table = $('#example-table-ajax'),
            $form_create = $('#from_category_player_create'),
            $form_update = $('#from_categoty_player_update'),
            id_show = $('input[name="id_organization"]').val(),
            url = route('organization.sport.place.data', id_show),
            columns = [
                {data: 'DT_Row_Index'},
                {data: 'id', "visible": false},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'state', name: 'state'},
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

        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
            var id_edit = $('input[name="id_organization"]').val(),
                route_edit = route('organization.menu.index', id_edit);
            $(".content-ajax").load(route_edit);
        });

    });
</script>
