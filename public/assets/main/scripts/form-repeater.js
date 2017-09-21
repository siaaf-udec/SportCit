var FormRepeater = function () {

    return {
        //main function to initiate the module
        init: function (form) {
            $(form).each(function(){
                $(this).repeater({
                    initEmpty: true,
                    show: function () {
                        $(this).slideDown();
                    },

                    hide: function (deleteElement) {
                        if (confirm('¿está seguro de que desea eliminar este elemento?')) {
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

}();