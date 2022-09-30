
console.log('hola mundo')
$(document).ready(function () {
    $('#registrar').click(function () {
        $('#registrar').addClass('is-loading');

        var rut = $('#rut').val();
        var nombre = $('#nombre').val();
        var apellidop = $('#apellidop').val();
        var apellidom = $('#apellidom').val();
        var fechaNacimiento = $('#fechaNacimiento').val();
        var correo = $('#correo').val();
        var password = $('#password').val();
        var comprobar = $('#comprobar').val();

        var file = $('#file')[0].files[0];

        var formData = new FormData();

        formData.append("nombre", nombre);
        formData.append("correo", correo);
        formData.append("password", password);
        formData.append("rut", rut);
        formData.append("apellidop", apellidop);
        formData.append("apellidom", apellidom);
        formData.append("fechaNacimiento", fechaNacimiento);
        formData.append("file", file);

        if (password == comprobar && password.trim() != "") {

            $.ajax({
                url: '../control/usuarioControl.php?do=r',
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function (json) {
                if (json['ret']) {
                    toastr.success(json['msj']);
                    setTimeout(function () {
                        $('#registrar').removeClass('is-loading');
                        window.location.replace("?mod=reg");
                    }, 3000)
                }
                else {
                    toastr.error(json['msj']);
                    setTimeout(function () {
                        $('#registrar').removeClass('is-loading');
                    }, 3000);
                }
            });
        } else {
            $('#password').addClass('is-danger');
            $('#comprobar').addClass('is-danger');
            toastr.error('Contraseñas no coinciden');
            setTimeout(function () {
                $('#registrar').removeClass('is-loading');
                $('#password').removeClass('is-danger');
                $('#comprobar').removeClass('is-danger');
            }, 3000);
        }
    });

    /**
     * Validamos si el archivo cargado en input file es de tipo imagen
     */
    $('#file').change(function () {
        var file = this.files[0];
        var imageFile = file.type;
        var match = ['image/jpg', 'image/png', 'image/jpeg'];
        if (!((imageFile == match[0]) || (imageFile == match[1]) || (imageFile == match[2]))) {
            alert('ERROR');
            $('#file').val('');
            return false;
        }
    });
});