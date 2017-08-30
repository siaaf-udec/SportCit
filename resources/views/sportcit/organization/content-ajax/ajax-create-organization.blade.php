{{-- BEGIN HTML SAMPLE --}}
<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Crear Organización'])
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
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light " id="form_wizard_1">
                    <div class="portlet-body form">
                        {!! Form::open(['id' => 'form_create_organization', 'class' => 'form-horizontal', 'url' => '/forms']) !!}
                        <div class="form-wizard">
                            <div class="form-body">
                                <div class="row">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li>
                                            <a href="#tab1" data-toggle="tab" class="step">
                                                <span class="number"> 1 </span>
                                                <span class="desc">
                                                                <i class="fa fa-check"></i> Datos de organización </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab2" data-toggle="tab" class="step">
                                                <span class="number"> 2 </span>
                                                <span class="desc">
                                                                <i class="fa fa-check"></i> Archivos de Identidad </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab3" data-toggle="tab" class="step active">
                                                <span class="number"> 3 </span>
                                                <span class="desc">
                                                                <i class="fa fa-check"></i> Configuración de Usuario </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab4" data-toggle="tab" class="step">
                                                <span class="number"> 4 </span>
                                                <span class="desc">
                                                                <i class="fa fa-check"></i> Confirm </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-danger display-none">
                                            <button class="close" data-dismiss="alert"></button>
                                            Usted tiene errores en el formulario. por favor verifique.
                                        </div>
                                        <div class="alert alert-success display-none">
                                            <button class="close" data-dismiss="alert"></button>
                                            Su validación de formulario es exitosa!
                                        </div>
                                        <div class="tab-pane active" id="tab1">
                                            <h3 class="block">Ingrese los datos de la Organización</h3>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-right">
                                                    {!! Field::text('username', old('username'), [ 'label' => 'Nombre', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-user', 'help' => 'Ingrese el nombre.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('nit', old('nit'), [ 'label' => 'Nit', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-address-card-o', 'help' => 'Ingrese el Nit.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('address', old('address'), ['label' => 'Dirección', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-map-marker', 'help' => 'Ingrese la dirección.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('phone', old('phone'), [ 'label' => 'Teléfono', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-mobile', 'help' => 'Ingrese el número del teléfono.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('date', old('date'), ['label' => 'Fecha de Fundación', 'autofocus', 'auto' => 'off','class' => 'date-picker','data-date-format' => "yyyy-mm-dd"], ['icon' => 'fa fa-calendar', 'help' => 'Ingrese la fecha de fundación.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('color_organization', old('color_organization'), ['class' => 'demo','data-control' => 'hue', 'label' => 'Color', 'autofocus', 'auto' => 'off'], [ 'help' => 'Ingrese o seleccione un color.']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <h3 class="block">Archivos de identidad de la organización</h3>
                                            <div class="form-group">
                                                <div class="col-md-6 center">
                                                    <div class="dropzone dropzone-file-area data-dz-size"
                                                         id="my_dropzone">
                                                        <h3 class="sbold">Arrastra o da click aquí para cargar
                                                            archivos</h3>
                                                        <p> Por favor sube un archivo pdf con los documentos de
                                                            legalización. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <h3 class="block"> Datos Personales del Representante</h3>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('name', old('name'), ['label' => 'Nombre', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-user', 'help' => 'Ingrese el nombre.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('lastname', old('lastname'), ['required', 'label' => 'Apellido', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-user', 'help' => 'Ingrese el apellido.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::select(
                                                    'type_document',
                                                    ['T.I' => 'T.I', 'C.C' => 'C.C'],null,
                                                    ['label' => 'Tipo de identificación' , 'autofocus', 'auto' => 'off']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('number_document', old('number_document'), ['label' => 'Numero de Documento', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-sort-numeric-asc', 'help' => 'Ingrese el numero.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('date_birthday', old('date_birthday'), ['label' => 'Fecha de Cumpleaños', 'autofocus', 'auto' => 'off','class' => 'date-picker','data-date-format' => "yyyy-mm-dd"], ['icon' => 'fa fa-calendar', 'help' => 'Ingrese la fecha de Cumpleaños.']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    <h3 class="block"> Datos de contacto y cuenta</h3>
                                                    {!! Field::text('phone_user', old('phone_user'), ['required', 'max' => 60, 'label' => 'Teléfono', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-mobile', 'help' => 'Ingrese el número del teléfono.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('website', old('website'), ['label' => 'Sitio Web', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-steam', 'help' => 'Ingrese la url del sitio.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::email('email', old('email'), ['required', 'max' => 80, 'label' => 'E-mail', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-envelope-o', 'help' => 'Ingrese el correo electrónico.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::password('password',['id' => 'submit_form_password','label' => 'Contraseña', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-unlock-alt', 'help' => 'Ingrese su contraseña.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::password('rpassword',['label' => ' Repita su Contraseña', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-unlock-alt', 'help' => 'Ingrese su contraseña.']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <h3 class="block">Confirmación</h3>
                                            <h4 class="form-section">Organización</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nombre
                                                    Organización:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="username"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nit:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="nit"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Dirección:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="address"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Teléfono:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="phone"></p>
                                                </div>
                                            </div>
                                            <h4 class="form-section">Representante</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nombre:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="name"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Apellido:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="lastname"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tipo Documento:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static"
                                                       data-display="type_document"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Numero Documento:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static"
                                                       data-display="number_document"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Telefono:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static"
                                                       data-display="phone_user"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">E-mail:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static" data-display="email"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn btn-outline red button-cancel">
                                            <i class="fa fa-angle-left"></i>
                                            Cancelar </a>
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="fa fa-angle-left"></i>
                                            Anterior </a>
                                        <a href="javascript:;" class="btn btn-outline green button-next">
                                            Siguiente
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
    @endcomponent
</div>
{{-- END HTML SAMPLE --}}


{{--
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Inyecta scripts para inicializar componentes Javascript como
| > Tablas
| > Checkboxes
| > Radios
| > Mapas
| > Notificaciones
| > Validaciones de Formularios por JS
| > Entre otros
| @push('functions')
|
| @endpush
--}}

<script src="{{ asset('assets/pages/scripts/components-color-pickers.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/main/scripts/ui-toastr.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {

        var $form = $('#form_create_organization'),
            $wizard = $('#form_wizard_1');

        /*Configuracion de input tipo fecha*/
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            orientation: "left",
            autoclose: true,
            regional: 'es',
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'yyyy-mm-dd',
            firstDay: 1,
            showMonthAfterYear: false,
            yearSuffix: ''
        });

        var rules = {
            username: {minlength: 3, required: true},
            nit: {minlength: 5, required: true},
            address: {required: true},
            phone: {minlength: 5, required: true},
            date: {required: true},
            color_organization: {required: true},
            name: {required: true, minlength: 3},
            lastname: {required: true, minlength: 3},
            type_document: {required: true},
            number_document: {minlength: 5, number: true, maxlength: 13, required: true},
            phone_user: {minlength: 5, required: true},
            email: {
                email: true, required: true, remote: {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '{{ route('users.check.email') }}',
                    type: "POST"
                }
            },
            password: {minlength: 5, required: true},
            rpassword: {minlength: 5, required: true, equalTo: "#submit_form_password"}
        };
        var messages = {
            email: {
                remote: "El correo electronico ya ha sido registrado."
            }
        };


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
        $wizard.bootstrapWizard(FormWizard.init($wizard, $form, rules, messages, false));

        //dropzone
        var method = function () {
            return {
                init: function () {
                    return valores = {
                        'name_organization': $('input[name="username"]').val(),
                        'nit': $('input[name="nit"]').val(),
                        'address_organization': $('input[name="address"]').val(),
                        'phone_organization': $('input[name="phone"]').val(),
                        'fundation': $('input[name="date"]').val(),
                        'club_colors': $('input[name="color_organization"]').val(),
                        'name_user': $('input[name="name"]').val(),
                        'lastname_user': $('input[name="lastname"]').val(),
                        'type_document': $('select[name="type_document"]').val(),
                        'number_document': $('input[name="number_document"]').val(),
                        'birthday': $('input[name="date_birthday"]').val(),
                        'website': $('input[name="website"]').val(),
                        'phone_user': $('input[name="phone_user"]').val(),
                        'email': $('input[name="email"]').val(),
                        'password': $('input[name="password"]').val(),
                        'link_organization': $('input[name="username"]').val(),
                        'type_file': 'Legalidad'
                    }
                }
            };
        };

        var type_crud = 'CREATE',
            route_store =route('organization.store'),
            formatfile = '.pdf',
            numfile = 1;

        $("div#my_dropzone").dropzone(FormDropzone.init(route_store, formatfile, numfile, method(), type_crud));

        $('.button-cancel').on('click', function (e) {
            e.preventDefault();
            var route_cancel = route('organization.index.ajax');
            $(".content-ajax").load(route_cancel);
        });
    });

</script>

