function login() {
    var userName = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (userName == "" || password == "") {
        Swal.fire({
            text: "Campos obligatorios",
            icon: "warning",
            allowOutsideClick: false,
            allowEscapeKey: false,
            buttonsStyling: !1,
            confirmButtonText: "OK",
            customClass: {confirmButton: "btn btn-primary"}
        });
    } else {
        $.ajax({
            // la URL para la petición
            url: '/MAESTRIA/SIGPAC/public/login',
            // la información a enviar
            // (también es posible utilizar una cadena de datos)
            data: {u: userName, p: password},
            // especifica si será una petición POST o GET
            type: 'POST',
            // el tipo de información que se espera de respuesta
            dataType: 'html',
            // código a ejecutar si la petición es satisfactoria;
            // la respuesta es pasada como argumento a la función
            beforeSend: function () {
                // document.getElementById("cont-resp-excel-" + idePag).innerHTML = '<i class="fa fa-pulse fa-spinner"></i>';
            },
            success: function (respuesta) {
                //alert("Correcto");
                // document.getElementById("cont-resp-excel-" + idePag).innerHTML = respuesta;
                if (respuesta == true) {
                    Swal.fire({
                        text: "Datos Correctos",
                        icon: "success",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        customClass: {confirmButton: "btn btn-primary"}
                    }).then((result) => {
                        var url = document.getElementById('kt_sign_in_form').getAttribute('data-kt-redirect-url');
                        location.href = url;
                    });


                } else if (respuesta == false) {
                    Swal.fire({
                        text: "Datos Incorrectos",
                        icon: "error",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        buttonsStyling: !1,
                        confirmButtonText: "OK",
                        customClass: {confirmButton: "btn btn-primary"}
                    });
                }

            },
            // código a ejecutar si la petición falla;
            // son pasados como argumentos a la función
            // el objeto de la petición en crudo y código de estatus de la petición
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            },

            // código a ejecutar sin importar si la petición falló o no
            complete: function (xhr, status) {
                //alert('Petición realizada');
            }
        });
    }
}