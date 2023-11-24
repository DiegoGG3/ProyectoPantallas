// script.js

// Realizar una solicitud AJAX para obtener datos del servidor
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (this.readyState == 4) {
        if (this.status == 200) {
            console.log(this.responseText);
            // Parsear la respuesta JSON
            var response = JSON.parse(this.responseText);

            // Verificar el éxito de la respuesta
            if (response.success) {
                // Acceder a los datos
                var data = response.data;

                // Manipular los datos (por ejemplo, mostrar en la consola)
                console.log(data);
            } else {
                // Manejar el caso en que la solicitud no fue exitosa
                console.error('Error en la respuesta del servidor');
            }
        } else {
            // Manejar el caso en que la solicitud no fue exitosa
            console.error('Error en la solicitud AJAX');
        }
    }
};

xhr.open("GET", "./principal/pantalla.php", true);
xhr.send();
