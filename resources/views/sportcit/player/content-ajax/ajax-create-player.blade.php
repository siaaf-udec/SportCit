<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Crear Jugador'])

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
        <div class="form-body">
            <div class="row">
                <div class="col-md-12">
                    {!! Field::hidden('id_organization', $organization) !!}
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li class="active">
                                <a href="#tab_15_1" data-toggle="tab"> Creación Multiple </a>
                            </li>
                            <li>
                                <a href="#tab_15_2" data-toggle="tab"> Creación Unica </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_15_1">
                                <div class="form-group">
                                    {!! Form::open(['id' => 'form_multi_create_player', 'class' => 'mt-repeater', 'url' => '/forms']) !!}
                                    <h3 class="mt-repeater-title"></h3>
                                    <div data-repeater-list="group_a">
                                        <div data-repeater-item class="mt-repeater-item">
                                            <!-- jQuery Repeater Container -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    {!! Field::text(
                                                    'name',
                                                    ['label' => 'Nombre', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                                    ['help' => 'Ingrese el Nombre']) !!}
                                                </div>
                                                <div class="col-md-3">
                                                    {!! Field::text(
                                                    'lastname',
                                                    ['label' => 'Apellidos', 'max' => '15', 'min' => '2', 'required', 'auto' => 'off'],
                                                    ['help' => 'Ingrese el Nombre']) !!}
                                                </div>
                                                <div class="col-md-3">
                                                    {!! Field::email(
                                                    'email',
                                                    ['label' => 'Correo Electronico', 'auto' => 'off'],
                                                    ['help' => 'Digite su correo electronico']) !!}
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:;" data-repeater-delete
                                                       class="btn btn-danger mt-repeater-delete">
                                                        <i class="fa fa-close"></i> Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="margin-top-10">
                                        <a href="javascript:;" data-repeater-create
                                           class="btn btn-info mt-repeater-add">
                                            <i class="fa fa-plus"></i> Agregar</a>
                                        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_15_2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light " id="form_wizard_1">
                                            <div class="portlet-body form">
                                                {!! Form::open(['id' => 'form_single_create_player', 'class' => 'form', 'url' => '/forms', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form-wizard">
                                                    <div class="form-body">
                                                        <ul class="nav nav-pills nav-justified steps">
                                                            <li>
                                                                <a href="#tab1" data-toggle="tab" class="step">
                                                                    <span class="number"> 1 </span>
                                                                    <span class="desc">
                                                                <i class="fa fa-check"></i> Configuracion Principal </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab2" data-toggle="tab" class="step">
                                                                    <span class="number"> 2 </span>
                                                                    <span class="desc">
                                                                <i class="fa fa-check"></i> Configuración del Perfil </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab3" data-toggle="tab" class="step active">
                                                                    <span class="number"> 3 </span>
                                                                    <span class="desc">
                                                                <i class="fa fa-check"></i> Configuración de Permisos </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab4" data-toggle="tab" class="step">
                                                                    <span class="number"> 4 </span>
                                                                    <span class="desc">
                                                                <i class="fa fa-check"></i> Confirmación </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div id="bar" class="progress progress-striped"
                                                             role="progressbar">
                                                            <div class="progress-bar progress-bar-success"></div>
                                                        </div>
                                                        <div class="tab-content">
                                                            <div class="alert alert-danger display-none">
                                                                <button class="close" data-dismiss="alert"></button>
                                                                Usted tiene algunos errores de forma. Por favor,
                                                                compruebe a continuación.
                                                            </div>
                                                            <div class="alert alert-success display-none">
                                                                <button class="close" data-dismiss="alert"></button>
                                                                ¡La validación de su formulario es exitosa!
                                                            </div>
                                                            <div class="tab-pane active" id="tab1">
                                                                <h3 class="block">Datos Personales</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!! Field::text(
                                                                                'name_create',
                                                                                ['label' => 'Nombre', 'auto' => 'off'],
                                                                                ['help' => 'Digite su Nombre']) !!}
                                                                        {!! Field::date(
                                                                                'date_birthday',
                                                                                ['label' => 'Fecha de nacimiento', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                                                                ['help' => 'Digite su fecha de nacimiento', 'icon' => 'fa fa-calendar']) !!}
                                                                        {!! Field::select(
                                                                                'identity_type_create',
                                                                                ['T.I' => 'T.I', 'C.C' => 'C.C'],null,
                                                                                [ 'label' => 'Seleccione su tipo de identificación']) !!}
                                                                        {!! Field::date(
                                                                                'identity_expe_create',
                                                                                ['label' => 'Fecha de Expedición', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                                                                ['help' => 'Seleccione su fecha de expedición', 'icon' => 'fa fa-calendar']) !!}
                                                                        {!! Field::text(
                                                                                'eps_create',
                                                                                ['label' => 'EPS', 'auto' => 'off'],
                                                                                ['help' => 'Digite su EPS']) !!}
                                                                        {!! Field::text(
                                                                                'phone_create',
                                                                                ['label' => 'Numero Telefonico', 'auto' => 'off'],
                                                                                ['help' => 'Digite su numero telefonico']) !!}
                                                                        {!! Field::select(
                                                                                'state_create',
                                                                                ['Aprobado' => 'Aprobado', 'Pendiente' => 'Pendiente', 'Denegado' => 'Denegado'],null,
                                                                                [ 'label' => 'Seleccione su estado']) !!}
                                                                        {!! Field::password(
                                                                                'password_create',
                                                                                ['label' => 'Contraseña', 'id' => 'rpassword_create'],
                                                                                ['help' => 'Digite su contreaseña.']) !!}
                                                                    </div>
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!! Field::text(
                                                                                'lastname_create',
                                                                                ['label' => 'Apellido', 'auto' => 'off'],
                                                                                ['help' => 'Digite su Apellido']) !!}
                                                                        {!! Field::select(
                                                                                'sexo_create',
                                                                                ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'],null,
                                                                                [ 'label' => 'Género']) !!}
                                                                        {!! Field::text(
                                                                                'identity_no_create',
                                                                                ['label' => 'Numero de Identificación', 'auto' => 'off'],
                                                                                ['help' => 'Digite su numero de identificación']) !!}
                                                                        {!! Field::text(
                                                                                'identity_expe_place_create',
                                                                                ['label' => 'Lugar de expedición', 'auto' => 'off'],
                                                                                ['help' => 'Digite el lugar de expedición']) !!}
                                                                        {!! Field::select(
                                                                                'rh_create',
                                                                                ['AB+' => 'AB+', 'AB-' => 'AB-', 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B+', 'O+' => 'O+', 'O-' => 'O-'],null,
                                                                                [ 'label' => 'Seleccione su RH']) !!}
                                                                        {!! Field::text(
                                                                                'website_create',
                                                                                ['label' => 'Pagina web', 'auto' => 'off'],
                                                                                ['help' => 'Digite su pagina web']) !!}
                                                                        {!! Field::email(
                                                                                'email_create',
                                                                                ['label' => 'Correo Electronico', 'auto' => 'off'],
                                                                                ['help' => 'Digite su correo electronico']) !!}
                                                                        {!! Field::password(
                                                                                'rpassword_create',
                                                                                ['label' => 'Repita su Contraseña'],
                                                                                ['help' => 'Digite su contraseña.']) !!}
                                                                    </div>
                                                                </div>
                                                                <h3 class="block">Datos de Ubicación</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!! Field::text(
                                                                                'address_create',
                                                                                ['label' => 'Dirección Procedencia', 'auto' => 'off'],
                                                                                ['help' => 'Digite su dirección de procedencia']) !!}
                                                                        {!! Field::select(
                                                                                'Departamento', null,
                                                                                ['name' => 'regions_create']) !!}
                                                                    </div>
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!! Field::select(
                                                                                'Pais', null,
                                                                                ['name' => 'countries_create']) !!}
                                                                        {!! Field::select(
                                                                                'Ciudad', null,
                                                                                ['name' => 'cities_create']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab2">
                                                                <h3 class="block">Datos de perfil</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!! Field::text(
                                                                                'height_create',
                                                                                ['label' => 'Altura', 'auto' => 'off'],
                                                                                ['help' => 'Digite su altura']) !!}
                                                                        {!! Field::select(
                                                                                'foot_create',
                                                                                ['Zurdo' => 'Zurdo', 'Diestro' => 'Diestro', 'Ambos' => 'Ambos'],null,
                                                                                [ 'label' => 'Pie']) !!}
                                                                        {!! Field::text(
                                                                                'current_club_create',
                                                                                ['label' => 'Club Actual', 'auto' => 'off'],
                                                                                ['help' => 'Digite su club actual']) !!}
                                                                        {!! Field::text(
                                                                                'motto_create',
                                                                                ['label' => 'Lema', 'auto' => 'off'],
                                                                                ['help' => 'Digite su lema']) !!}
                                                                    </div>
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!! Field::text(
                                                                                'weight_create',
                                                                                ['label' => 'Peso', 'auto' => 'off'],
                                                                                ['help' => 'Digite su dirección de procedencia']) !!}
                                                                        {!! Field::text(
                                                                                'favorite_club_create',
                                                                                ['label' => 'Club Favorito', 'auto' => 'off'],
                                                                                ['help' => 'Digite su club favorito']) !!}
                                                                        {!! Field::text(
                                                                                'favorite_player_create',
                                                                                ['label' => 'Jugador Favorito', 'auto' => 'off'],
                                                                                ['help' => 'Digite su jugador favorito']) !!}
                                                                        {!! Field::select(
                                                                                'state_player_create',
                                                                                ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],null,
                                                                                [ 'label' => 'Seleccione el estado']) !!}

                                                                    </div>
                                                                </div>
                                                                <h3 class="block">Otros Datos</h3>
                                                                <div class="row">
                                                                    <div class="col-md-9 col-md-offset-1">
                                                                        {!! Field::textarea(
                                                                                'strengths_create',
                                                                                ['label' => 'Fortalezas', 'rows' => '4', 'cols' => '60', 'max' => '100', 'min' => '2', 'auto' => 'off'],
                                                                                ['help' => 'Ingrese sus fortalezas']) !!}
                                                                        {!! Field::textarea(
                                                                                'weakness_create',
                                                                                ['label' => 'Debilidades', 'rows' => '4', 'cols' => '60', 'max' => '100', 'min' => '2', 'auto' => 'off'],
                                                                                ['help' => 'Ingrese sus debilidades']) !!}
                                                                        {!! Field::textarea(
                                                                                'training_target_create',
                                                                                ['label' => 'Debilidades', 'rows' => '4', 'cols' => '60', 'max' => '100', 'min' => '2', 'auto' => 'off'],
                                                                                ['help' => 'Ingrese los objetivos de entrenamiento']) !!}
                                                                        {!! Field::textarea(
                                                                                'other_create',
                                                                                ['label' => 'Otros', 'rows' => '4', 'cols' => '60', 'max' => '100', 'min' => '2', 'auto' => 'off'],
                                                                                ['help' => 'Ingrese otros datos']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab3">
                                                                <h3 class="block">Foto de perfil</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!!  Field::file('image_profile_create') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab4">
                                                                <h3 class="block">Confirme su cuenta</h3>
                                                                <h4 class="form-section">Datos Personales</h4>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nombre:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="name_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Apellido:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="lastname_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Fecha de
                                                                        Nacimiento:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="date_birthday"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Género:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="sexo_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Tipo de
                                                                        identificación:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="identity_type_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Numero de
                                                                        Identificación:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="identity_no_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Fecha de
                                                                        Expedición:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="identity_expe_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Lugar de
                                                                        expedición:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="identity_expe_place_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">EPS:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="eps_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">RH:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="state_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Numero Telefonico:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="phone_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Estado Usuario:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="state_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Pagina web:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="website_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Correo Electronico:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="email_create"></p>
                                                                    </div>
                                                                </div>
                                                                <h4 class="form-section">Datos de Ubicación</h4>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Dirección
                                                                        Procedencia:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="address_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Pais:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="countries_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Departamento:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="regions_create"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Ciudad:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static"
                                                                           data-display="cities_create"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <a href="javascript:;"
                                                                   class="btn btn-outline red button-cancel"><i
                                                                            class="fa fa-angle-left"></i>
                                                                    Cancelar
                                                                </a>
                                                                <a href="javascript:;"
                                                                   class="btn default button-previous">
                                                                    <i class="fa fa-angle-left"></i> Atras </a>
                                                                <a href="javascript:;"
                                                                   class="btn btn-outline green button-next"> Continuar
                                                                    <i class="fa fa-angle-right"></i>
                                                                </a>
                                                                {!! Form::submit('Guardar', ['class' => 'btn blue button-submit']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    @endcomponent
</div>

{{-- jquery-validation Scripts --}}
<script src="{{ asset('assets/main/scripts/form-validation-md.js') }}" type="text/javascript"></script>
{{-- form-wizard Scripts --}}
<script src="{{ asset('assets/main/scripts/form-wizard.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    var $repeater_create = $('.mt-repeater');

    var componentSelect2 = function () {
        return {
            init: function () {
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
            }
        }
    }();

    var FormRepeater = function () {
        return {
            init: function () {
                $repeater_create.each(function () {
                    $(this).repeater({
                        initEmpty: true,
                        show: function () {
                            $(this).slideDown();
                        },

                        hide: function (deleteElement) {
                            if (confirm('Are you sure you want to delete this element?')) {
                                $(this).slideUp(deleteElement);
                            }
                        },
                        ready: function (setIndexes) {

                        },
                        isFirstItemUndeletable: true
                    });
                });
            }
        };
    }();//var info=$('.mt-repeater').repeaterVal();

    jQuery(document).ready(function () {
        var $id_org = $('input[name="id_organization"]').val(),
            $form_multi_create = $('#form_multi_create_player'),
            $form_wizard_single_create = $('#form_single_create_player'),
            $wizard = $('#form_wizard_1'),
            $widget_select_countries_create = $('select[name="countries_create"]'),
            $widget_select_regions_create = $('select[name="regions_create"]'),
            $widget_select_cities_create = $('select[name="cities_create"]');

        FormRepeater.init();
        componentSelect2.init();

        /*Crear Multi Players*/
        var createMultiPlayers = function () {
            return {
                init: function () {
                    var route_create = route('organization.player.store_multi'),
                        type = 'POST',
                        async = async || false;

                    var formData = new FormData();
                    formData.append('fk_organization_id', $('input[name="id_organization"]').val());
                    formData.append('group', JSON.stringify($repeater_create.repeaterVal()));

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
                                UIToastr.init(xhr, response.title, response.message);
                                $('[data-repeater-list]').empty();
                                $('.mt-repeater-add').click();
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

        var rules_multi_create = {
            name: {required: true, minlength: 3},
            lastname: {required: true, minlength: 3},
            email: true, required: true, remote: {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('users.check.email') }}',
                type: "POST"
            }
        };

        var messages_multi_create = {
            email: {
                remote: "El correo electronico ya ha sido registrado."
            }
        };

        FormValidationMd.init($form_multi_create, rules_multi_create, messages_multi_create, createMultiPlayers());

        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
            var route_edit = route('organization.player.index.ajax', $id_org);
            $(".content-ajax").load(route_edit);
        });

        /*Crear Single Players*/
        var createSinglePlayers = function () {
            return {
                init: function () {
                    var route_create = route('organization.player.store_single'),
                        type = 'POST',
                        async = async || false;

                    var formData = new FormData();
                    // Usuario
                    formData.append('fk_organization_id', $('input[name="id_organization"]').val());
                    formData.append('name', $('input:text[name="name_create"]').val());
                    formData.append('lastname', $('input:text[name="lastname_create"]').val());
                    formData.append('birthday', $('#date_birthday').val());
                    formData.append('identity_type', $('select[name="identity_type_create"]').val());
                    formData.append('identity_no', $('input:text[name="identity_no_create"]').val());
                    formData.append('identity_expe_date', $('#identity_expe_create').val());
                    formData.append('identity_expe_place', $('input:text[name="identity_expe_place_create"]').val());
                    formData.append('eps', $('input:text[name="eps_create"]').val());
                    formData.append('rh', $('select[name="rh_create"]').val());
                    formData.append('address', $('input:text[name="address_create"]').val());
                    formData.append('gender', $('select[name="sexo_create"]').val());
                    formData.append('phone', $('input:text[name="phone_create"]').val());
                    formData.append('email', $('input[name="email_create"]').val());
                    formData.append('password', $('input[name="password_create"]').val());
                    formData.append('state', $('select[name="state_create"]').val());
                    formData.append('website', $('input:text[name="website_create"]').val());

                    formData.append('countries_id', $('select[name="countries_create"]').val());
                    formData.append('regions_id', $('select[name="regions_create"]').val());
                    formData.append('cities_id', $('select[name="cities_create"]').val());

                    // Jugador
                    formData.append('favorite_club', $('input:text[name="favorite_club_create"]').val());
                    formData.append('height', $('input:text[name="height_create"]').val());
                    formData.append('weight', $('input:text[name="weight_create"]').val());
                    formData.append('foot', $('select[name="foot_create"]').val());
                    formData.append('motto', $('input:text[name="motto_create"]').val());
                    formData.append('state_player', $('select[name="state_player_create"]').val());
                    formData.append('current_club', $('input:text[name="current_club_create"]').val());
                    formData.append('favorite_player', $('input:text[name="favorite_player_create"]').val());
                    formData.append('strengths', $('#strengths_create').val());
                    formData.append('weakness', $('#weakness_create').val());
                    formData.append('training_target', $('#training_target_create').val());
                    formData.append('other', $('#other_create').val());

                    /*Imagen*/
                    var FileImage = document.getElementById("image_profile_create");
                    console.log(FileImage);
                    formData.append('image_profile_create', FileImage.files[0]);

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
                                UIToastr.init(xhr, response.title, response.message);
                                $('[data-repeater-list]').empty();
                                $('.mt-repeater-add').click();
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

        var rules_single_create = {
            id_organization: {number: true, required: true},
            name_create: {required: true, minlength: 3},
            lastname_create: {required: true, minlength: 3},
            date_birthday: {date: true},
            identity_type_create: {minlength: 0},
            identity_no_create: {number: true, minlength: 8},
            identity_expe_create: {date: true},
            eps_create: {minlength: 3},
            rh_create: {minlength: 2},
            address_create: {minlength: 8},
            sexo_create: {minlength: 0},
            phone_create: {minlength: 8},
            password_create: {required: true, minlength: 5},
            rpassword_create: {minlength: 5, required: true, equalTo: "#rpassword_create"},
            state_create: {minlength: 0},
            website_create: {minlength: 6},
            countries_create: {minlength: 0},
            regions_create: {minlength: 0},
            cities_create: {minlength: 0},
            favorite_club_create: {minlength: 3},
            height_create: {minlength: 2},
            weight_create: {minlength: 2},
            foot_create: {minlength: 0},
            motto_create: {minlength: 8},
            state_player_create: {minlength: 0},
            current_club_create: {minlength: 3},
            favorite_player_create: {minlength: 3},
            strengths_create: {minlength: 3},
            weakness_create: {minlength: 10},
            training_target_create: {minlength: 10},
            other_create: {minlength: 10},
            image_profile_create: {extension: "jpg|png"},
            email_create: true, required: true, remote: {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('users.check.email') }}',
                type: "POST"
            }
        };

        var messages_single_create = {
            email: {
                remote: "El correo electronico ya ha sido registrado."
            }
        };

        FormWizard.init($wizard, $form_wizard_single_create, rules_single_create, messages_single_create, createSinglePlayers());

        /*Carga todos los paises*/
        var route_country = '{{ route('location.countries') }}';
        $.get(route_country, function (response, status) {
            $(response.data).each(function (key, value) {
                $widget_select_countries_create.append(new Option(value.name, value.id));
            });
            $widget_select_countries_create.val([]);
            $widget_select_regions_create.val([]);
            $widget_select_cities_create.val([]);
        });

        /*Carga todos los Departamentos*/
        var region_id;
        $widget_select_countries_create.on('change', function () {
            region_id = $(this).val();
            var route_region = '{{ route('location.regions.find') }}' + '/' + region_id;
            $widget_select_regions_create.empty().append('whatever');
            $widget_select_cities_create.empty().append('whatever');
            $.ajax({
                url: route_region,
                type: 'GET',
                beforeSend: function () {
                    App.blockUI({target: '.portlet-form', animate: true});
                },
                success: function (response, xhr, request) {
                    if (request.status === 200 && xhr === 'success') {
                        App.unblockUI('.portlet-form');
                        $(response.data).each(function (key, value) {
                            $widget_select_regions_create.append(new Option(value.name, value.id));
                        });
                        $widget_select_regions_create.val([]);
                        $widget_select_cities_create.val([]);
                    }
                }
            });
        });


        /*Carga todas las Ciudades*/
        $widget_select_regions_create.on('change', function () {
            var route_city = '{{ route('location.cities.find') }}' + '/' + region_id + '/' + $(this).val();
            $widget_select_cities_create.empty().append('whatever');
            $.ajax({
                url: route_city,
                type: 'GET',
                beforeSend: function () {
                    App.blockUI({target: '.portlet-form', animate: true});
                },
                success: function (response, xhr, request) {
                    if (request.status === 200 && xhr === 'success') {
                        App.unblockUI('.portlet-form');
                        $(response.data).each(function (key, value) {
                            $widget_select_cities_create.append(new Option(value.name, value.id));
                        });
                        $widget_select_cities_create.val([]);
                    }
                }
            });
        });

    });
</script>
