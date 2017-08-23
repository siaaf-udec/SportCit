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
            {!! Field::hidden('id_edit_organization', $organization['data']->id) !!}
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 edit-info red" href="#">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1349">{{$organization['count']}}%</span>
                        </div>
                        <div class="desc"> Información Basica </div>
                        <div class="desc">
                            <div class="progress-info">
                                <div class="progress">
                                        <span style="width: {{$organization['count']}}%;" class="progress-bar progress-bar-success grey">
                                            <span class="sr-only">{{$organization['count']}}% Cambio</span>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 edit-info purple" href="#">
                    <div class="visual">
                        <i class="fa fa-ravelry"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1349">{{$organization['count']}}%</span>
                        </div>
                        <div class="desc"> Categorias </div>
                    </div>
                </a>
            </div>
        </div>
    @endcomponent
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        $('.edit-info').on('click', function (e) {
            e.preventDefault();
            var id_edit = $('input[name="id_edit_organization"]').val(),
                route_edit = route('organization.edit',id_edit);
            $(".content-ajax").load(route_edit);
        });
    });
</script>
