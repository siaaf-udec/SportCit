{{-- BEGIN HTML SAMPLE --}}
<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'icon-frame', 'title' => 'Crear Test'])
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
        <div class="form-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::open(['id' => 'form_create_test', 'class' => 'mt-repeater', 'url' => '/forms']) !!}
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
{{-- form-repeater Scripts --}}
<script src="{{ asset('assets/main/scripts/form-repeater.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {

        var $form = $('#form_create_test')
            $repeater = $('.mt-repeater');


        FormRepeater.init($repeater);

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

        //Aplicar la validación en select2 cambio de valor desplegable, esto sólo es necesario para la integración de lista desplegable elegido.
        $('.pmd-select2', $form).change(function () {
            $form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
        $('.button-cancel').on('click', function (e) {
            e.preventDefault();
            var route_cancel = route('organization.index.ajax');
            $(".content-ajax").load(route_cancel);
        });
    });

</script>