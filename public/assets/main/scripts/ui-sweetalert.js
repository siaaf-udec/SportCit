var SweetAlert = function () {

    return {
        //main function to initiate the module
        init: function (title, text, type, url, datos, peticion) {
            swal({
                    title: title,
                    text: text,
                    type: type,
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false
                },
                function () {
                    App.blockUI();
                    type_json = 'POST';
                    var async = async || false;
                    $.ajax({
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache: false,
                        type: type_json,
                        contentType: false,
                        data: datos,
                        processData: false,
                        async: async,
                        success: function (response, xhr, request) {
                            if (request.status === 200 && xhr === 'success') {
                                swal("Eliminado!", "Datos eliminados correctamente.", "success");
                                location.reload();
                            }
                        },
                        error: function (response, xhr, request) {
                            if (request.status === 422 && xhr === 'error') {
                                UIToastr.init(xhr, response.title, response.message);
                                App.unblockUI();
                            }
                        }
                    });

                });
        }
    }

}();
