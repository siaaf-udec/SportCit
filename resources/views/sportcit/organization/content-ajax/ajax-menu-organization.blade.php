<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Menu de Organización'])

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
        <div class="clearfix"></div>
        <div class="row">
            {!! Field::hidden('id_edit_organization', $organization['data']->id) !!}
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 edit-info red" href="#">
                    <div class="visual">
                        <i class="fa fa-pencil-square-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1349">{{$organization['count']}}%</span>
                        </div>
                        <div class="desc"> Información Basica</div>
                        <div class="desc">
                            <div class="progress-info">
                                <div class="progress">
                                        <span style="width: {{$organization['count']}}%;"
                                              class="progress-bar progress-bar-success grey">
                                            <span class="sr-only">{{$organization['count']}}% Cambio</span>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 category-info purple" href="#">
                    <div class="visual">
                        <i class="fa fa-ravelry"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                  data-value="1349">{{$organization['data']->num_category_organization}}</span>
                        </div>
                        <div class="desc"> Categorias</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 player-info yellow" href="#">
                    <div class="visual">
                        <i class="fa fa-futbol-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                  data-value="1349">{{$organization['data']->num_players_organization}}</span>
                        </div>
                        <div class="desc"> Deportistas</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 team-info blue" href="#">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                  data-value="1349">{{$organization['data']->num_teams_organization}}</span>
                        </div>
                        <div class="desc"> Equipos</div>
                    </div>
                </a>
            </div>
        </div>
    @endcomponent
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        var $id_organization = $('input[name="id_edit_organization"]').val(),
            $route_organization;

        $('.edit-info').on('click', function (e) {
            e.preventDefault();
            $route_organization = route('organization.edit', $id_organization);
            $(".content-ajax").load($route_organization);
        });
        $('.category-info').on('click', function (e) {
            e.preventDefault();
            $route_organization = route('organization.category.index.ajax', $id_organization);
            $(".content-ajax").load($route_organization);
        });
        $('.player-info').on('click', function (e) {
            e.preventDefault();
            $route_organization = route('organization.player.index.ajax', $id_organization);
            $(".content-ajax").load($route_organization);
        });
        $('.team-info').on('click', function (e) {
            e.preventDefault();
            $route_organization = route('organization.team.index.ajax', $id_organization);
            $(".content-ajax").load($route_organization);
        });
        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
            $route_organization = route('organization.index.ajax', $id_organization);
            $(".content-ajax").load($route_organization);
        });
    });
</script>
