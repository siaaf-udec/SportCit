{{-- BEGIN HTML SAMPLE --}}
<div class="col-md-12">
    @component('themes.bootstrap.elements.portlets.portlet', ['icon' => 'fa fa-file-text', 'title' => 'Crear Test'])
        @slot('actions', [
                    'link_cancel' => [
                     'link' => '',
                    'icon' => 'fa fa-chevron-left',
                    ],
                    'link_wrench' => [
                        'link' => '',
                        'icon' => 'fa fa-wrench',
                    ],
                    'link_trash' => [
                        'link' => '',
                        'icon' => 'fa fa-trash',
                    ],

                ])
        <div class="form-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        {!! Field::text('nameTest',  ['label' => 'Nombre Test', 'autofocus', 'auto' => 'off'], ['icon' => 'fa fa-steam', 'help' => 'Ingrese el nombre del test.']) !!}
                        <div id="fb-editor"></div>
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
{{-- form-builder Scripts --}}
<script src="{{ asset('assets/main/scripts/form-builder.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('.button-cancel').on('click', function (e) {
            e.preventDefault();
            var route_cancel = route('organization.index.ajax');
            $(".content-ajax").load(route_cancel);
        });

        $('#link_cancel').on('click', function (e) {
            e.preventDefault();
            $route_test = route('test.index.ajax');
            $(".content-ajax").load($route_test);
        });
    });

</script>