{{-- BEGIN HTML SAMPLE --}}
<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Actualizar Organización'])
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
                                            <a href="#tab4" data-toggle="tab" class="step">
                                                <span class="number"> 3 </span>
                                                <span class="desc">
                                                                <i class="fa fa-check"></i> Confirmación </span>
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
                                                    {!! Field::hidden('id_organization',$organization->id) !!}
                                                    {!! Field::hidden('name_file',$name ) !!}
                                                    {!! Field::text('username',$organization->name_organization, [ 'label' => 'Nombre', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-user', 'help' => 'Ingrese el nombre.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('nit',$organization->nit , [ 'label' => 'Nit', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-address-card-o', 'help' => 'Ingrese el Nit.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('address',$organization->address_organization, ['label' => 'Dirección', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-map-marker', 'help' => 'Ingrese la dirección.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('phone', $organization->phone_organization, [ 'label' => 'Teléfono', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-mobile', 'help' => 'Ingrese el número del teléfono.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('date', $organization->fundation, ['label' => 'Fecha de Fundación', 'autofocus', 'auto' => 'off','class' => 'date-picker','data-date-format' => "yyyy-mm-dd"], ['icon' => 'fa fa-calendar', 'help' => 'Ingrese la fecha de fundación.']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-lg-offset-3 text-left">
                                                    {!! Field::text('color_organization',$organization->club_colors, ['class' => 'demo','data-control' => 'hue', 'label' => 'Color', 'autofocus', 'auto' => 'off'], [ 'help' => 'Ingrese o seleccione un color.']) !!}
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn btn-outline red button-cancel"><i
                                                    class="fa fa-angle-left"></i>
                                            Cancelar
                                        </a>
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="fa fa-angle-left"></i> Anterior </a>
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

{{-- wizard Scripts --}}
<script src="{{ asset('assets/main/scripts/form-wizard.js') }}" type="text/javascript"></script>
{{-- bootstrap-colorpicker Scripts --}}
<script src="{{ asset('assets/pages/scripts/components-color-pickers.min.js')}}" type="text/javascript"></script>
{{-- dropzone Scripts --}}
<script src="{{ asset('assets/main/scripts/dropzone.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {

        var $form = $('#form_create_organization'),
            $wizard = $('#form_wizard_1');

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
            color_organization: {required: true}
        };
        var messages = {};


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
                        'id': $('input[name="id_organization"]').val(),
                        'name_organization': $('input[name="username"]').val(),
                        'nit': $('input[name="nit"]').val(),
                        'address_organization': $('input[name="address"]').val(),
                        'phone_organization': $('input[name="phone"]').val(),
                        'fundation': $('input[name="date"]').val(),
                        'club_colors': $('input[name="color_organization"]').val(),
                        'name_file': $('input[name="name_file"]').val(),
                    }
                }
            };
        };

        var type_crud = 'UPDATE',
            id_edit = $('input[name="id_organization"]').val(),
            route_edit = route('organization.update', id_edit),
            formatfile = '.pdf',
            numfile = 1;

        $("div#my_dropzone").dropzone(FormDropzone.init(route_edit, formatfile, numfile, method(), type_crud));

        $('.button-cancel').on('click', function (e) {
            e.preventDefault();
            var id_edit = '{{$organization->id }}',
                route_edit = route('organization.menu.index', id_edit);
            $(".content-ajax").load(route_edit);
        });
    });

</script>

