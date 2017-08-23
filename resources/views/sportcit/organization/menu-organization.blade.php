<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Menu de Organización'])

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
        <div class="clearfix"></div>
        <div class="row">
            {!! Field::hidden('id_edit_organization', $organization->id) !!}
            <div class="col-md-12">
                <div class="tiles">
                    <div class="tile bg-green edit-info">
                        <div class="tile-body">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name"> Informacion Basica </div>
                            <div class="number"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcomponent
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        $('.edit-info').on('click', function (e) {
            e.preventDefault();

            var id_edit = $('input[name="id_edit_organization"]').val();
                route_edit = route('organization.edit',id_edit);
                route_edit = '{{ route('organization.edit') }}' + '/' + id_edit;
            $(".content-ajax").load(route_edit);
        });
    });
</script>
