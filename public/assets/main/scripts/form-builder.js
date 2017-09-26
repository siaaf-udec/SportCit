jQuery(function ($) {

    var templates = {
        starRating: function (fieldData) {
            return {
                field: '<span id="' + fieldData.name + '">',
                onRender: function () {
                    $(document.getElementById(fieldData.name)).rateYo({rating: 3.6});
                }
            };
        }
    };

    var editing = true;

    /**
     * Toggles the edit mode for the demo
     * @return {Boolean} editMode
     */
    function toggleEdit() {
        document.body.classList.toggle('form-rendered', editing);
        return editing = !editing;
    }

    var typeUserAttrs = {
        text: {
            className: {
                label: 'Class',
                options: {
                    'red form-control': 'Red',
                    'green form-control': 'Green',
                    'blue form-control': 'Blue'
                },
                style: 'border: 1px solid red'
            }
        }
    };

    var fbOptions = {
        onSave: function (e, formData) {
            var test = $('input[name="nameTest"]').val();
            var expresionRegular = /^\s+|\s+$/g;
            test = test.replace(expresionRegular, "");
            if(test == null || test.length <= 3){
                UIToastr.init('error', 'El Campo Nombre Test', 'Campo Requerido debe tener minimo 3 caracteres.');
            }
            else{
                var valores = JSON.parse(formData);
                if( valores == null || valores.length == 0){
                    UIToastr.init('error', 'Test sin campos', 'Debe agregar campos a l test.');
                }else{
                    var variables = "", tam = valores.length ;
                    for(i=0; i<tam ; i++){
                        if(i == tam-1){
                            variables += valores[i]['name'] + "";
                            break;
                        }
                        variables += valores[i]['name'] + ",";
                    }
                    var forData = new FormData();
                    forData.append('name', test);
                    forData.append('variables', variables);
                    forData.append('style', formData);

                    //ajax
                    App.blockUI();
                    var type = 'POST', async = async || false, routes = route('test.store');

                    $.ajax({
                        url: routes,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache: false,
                        type: type,
                        contentType: false,
                        data: forData,
                        processData: false,
                        async: async,
                        success: function (response, xhr, request) {
                            if (request.status === 200 && xhr === 'success') {
                                UIToastr.init(xhr, response.title, response.message);
                                route_index = route('test.index.ajax');
                                $(".content-ajax").load(route_index);
                            }
                        },
                        error: function (response, xhr, request) {
                            if (request.status === 422 && xhr === 'error') {
                                UIToastr.init(xhr, response.title, response.message);
                                App.unblockUI();
                            }
                        }
                    });
                }

            }

        },
        typeUserAttrs: typeUserAttrs
    };

    var formBuilder = $('#fb-editor').formBuilder(fbOptions);
    var fbPromise = formBuilder.promise;
    fbPromise.then(function (fb) {
        fb.actions.setLang('es-ES');
    });
});