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
                                    {!! Form::open(['id' => 'form_create_player', 'class' => 'mt-repeater', 'url' => '/forms']) !!}
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
                                            <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
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
                                                {!! Form::open(['id' => 'from_users_create', 'class' => 'form-horizontal', 'url' => '/forms']) !!}
                                                <div class="form-wizard">
                                                    <div class="form-body">
                                                        <ul class="nav nav-pills nav-justified steps">
                                                            <li>
                                                                <a href="#tab1" data-toggle="tab" class="step">
                                                                    <span class="number"> 1 </span>
                                                                    <span class="desc">
                                                                <i class="fa fa-check"></i> Configuracion de Cuenta </span>
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
                                                        <div id="bar" class="progress progress-striped" role="progressbar">
                                                            <div class="progress-bar progress-bar-success"> </div>
                                                        </div>
                                                        <div class="tab-content">
                                                            <div class="alert alert-danger display-none">
                                                                <button class="close" data-dismiss="alert"></button> Usted tiene algunos errores de forma. Por favor, compruebe a continuación. </div>
                                                            <div class="alert alert-success display-none">
                                                                <button class="close" data-dismiss="alert"></button> ¡La validación de su formulario es exitosa! </div>
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
                                                                                ['label' => 'Fecha de Nacimiento', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                                                                ['help' => 'Digite su fecha de nacimiento', 'icon' => 'fa fa-calendar']) !!}
                                                                        {!! Field::select(
                                                                                'identity_type_create',
                                                                                ['T.I' => 'T.I', 'C.C' => 'C.C'],null,
                                                                                [ 'label' => 'Tipo de identificación']) !!}
                                                                        {!! Field::date(
                                                                                'identity_expe_create',
                                                                                ['label' => 'Fecha de Expedición', 'auto' => 'off', 'data-date-format' => "yyyy-mm-dd", 'data-date-start-date' => "+0d"],
                                                                                ['help' => 'Digite su fecha de expedición', 'icon' => 'fa fa-calendar']) !!}
                                                                        {!! Field::text(
                                                                                'phone_create',
                                                                                ['label' => 'Numero Telefonico', 'auto' => 'off'],
                                                                                ['help' => 'Digite su numero telefonico']) !!}
                                                                        {!! Field::email(
                                                                                'email_create',
                                                                                ['label' => 'Correo Electronico', 'auto' => 'off'],
                                                                                ['help' => 'Digite su correo electronico']) !!}
                                                                    </div>
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!! Field::text(
                                                                            'lastname_create',
                                                                            ['label' => 'Apellido', 'auto' => 'off'],
                                                                            ['help' => 'Digite su Apellido']) !!}
                                                                        {!! Field::select(
                                                                            'sexo_create',
                                                                            ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'],null,
                                                                            [ 'label' => 'Sexo']) !!}
                                                                        {!! Field::text(
                                                                                'identity_no_create',
                                                                                ['label' => 'Numero de Identificación', 'auto' => 'off'],
                                                                                ['help' => 'Numero de Identificación']) !!}
                                                                        {!! Field::text(
                                                                                'identity_expe_place_create',
                                                                                ['label' => 'Lugar de expedición', 'auto' => 'off'],
                                                                                ['help' => 'Lugar de expedición']) !!}
                                                                        {!! Field::select(
                                                                                'state_create',
                                                                                ['Aprobado' => 'Aprobado', 'Pendiente' => 'Pendiente', 'Denegado' => 'Denegado'],null,
                                                                                [ 'label' => 'Estado']) !!}
                                                                        {!! Field::password(
                                                                                'password_create',
                                                                                ['label' => 'Contraseña'],
                                                                                ['help' => 'Digite su contreaseña.']) !!}
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
                                                                <h3 class="block">Proporcione los detalles deL perfil</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-md-offset-1">
                                                                        {!!  Field::file('image_profile_create') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab3">
                                                                <h3 class="block">Proporcione el roll</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-md-offset-1">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="tab4">
                                                                <h3 class="block">Confirme su cuenta</h3>
                                                                <h4 class="form-section">Datos Personales</h4>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nombre:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="name_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Apellido:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="lastname_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Fecha de Nacimiento:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="date_birthday"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Sexo:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="sexo_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Tipo de identificación:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="identity_type_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Numero de Identificación:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="identity_no_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Fecha de Expedición:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="identity_expe_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Lugar de expedición:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="identity_expe_place_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Numero Telefonico:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="phone_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Estado:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="state_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Correo Electronico:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="email_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <h4 class="form-section">Datos de Ubicación</h4>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Dirección Procedencia:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="address_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Pais:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="countries_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Departamento:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="regions_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Ciudad:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="cities_create"> </p>
                                                                    </div>
                                                                </div>
                                                                <h4 class="form-section">Datos de Permisos</h4>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Roles:</label>
                                                                    <div class="col-md-4">
                                                                        <p class="form-control-static" data-display="multi_select_roles_create[]"> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <a href="javascript:;" class="btn btn-outline red button-cancel"><i class="fa fa-angle-left"></i>
                                                                    Cancelar
                                                                </a>
                                                                <a href="javascript:;" class="btn default button-previous">
                                                                    <i class="fa fa-angle-left"></i> Atras </a>
                                                                <a href="javascript:;" class="btn btn-outline green button-next"> Continuar
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
<script type="text/javascript">
    var $repeater_create = $('.mt-repeater');

    var FormSelect2 = function () {
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
            $form_create = $('#form_create_player');

        FormRepeater.init();

        /*Crear Permissions*/
        var createPlayers = function () {
            return {
                init: function () {
                    var route_create = route('organization.player.store'),
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

        var rules_create = {
            name: {required: true, minlength: 3},
            lastname: {required: true, minlength: 3},
            email: {
                email: true, required: true, remote: {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '{{ route('users.check.email') }}',
                    type: "POST"
                }
            }
        };

        var messages_create = {
            email: {
                remote: "El correo electronico ya ha sido registrado."
            }
        };

        FormValidationMd.init($form_create, rules_create, messages_create, createPlayers());

        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
            var route_edit = route('organization.player.index.ajax', $id_org);
            $(".content-ajax").load(route_edit);
        });
    });
</script>
