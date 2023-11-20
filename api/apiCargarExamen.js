function hacerExamen(ev, boton) {
    ev.preventDefault();
    var idExamen = boton.parentNode.parentNode.childNodes[1].id; // ID del examen a hacer

    fetch('./interfaz/pregunta.html')
        .then(x => x.text())
        .then(texto => {
            var almacen = document.createElement("div");
            almacen.innerHTML = texto;
            var modeloPregunta = almacen.querySelector(".pregunta-container");
            fetch('api/apiCargarExamen.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        "idExamen": idExamen
                    })
                })
                .then(x => x.json())
                .then(y => {
                    var header = document.getElementsByTagName("header");
                    document.body.removeChild(header[0]);
                    header = document.createElement("header");
                    header.id = "headerPregunta";
                    document.body.appendChild(header);

                    for (var i = 0; i < y.length; i++) {
                        var btnHeader = generarHeader(y[i], i + 1);
                        header.appendChild(btnHeader);
                    }

                    var main = document.getElementsByTagName("main");
                    document.body.removeChild(main[0]);
                    main = document.createElement("main");
                    main.id = "mainPregunta";
                    document.body.appendChild(main);

                    var footer = document.getElementsByTagName("footer");
                    document.body.removeChild(footer[0]);
                    footer = document.createElement("footer");
                    footer.id = "footerPregunta";
                    document.body.appendChild(footer);

                    var contenedor = document.createElement("div");
                    contenedor.innerHTML = y;

                    for (var i = 0; i < y.length; i++) {
                        generarPregunta(modeloPregunta.cloneNode(true), y[i]);
                    }
                    
                });
        });
};

function generarHeader(objeto, tamaño) {
    var boton = document.createElement("button");
    boton.innerHTML = tamaño;
    boton.id = "boton" + objeto.id;
    return boton;
}

function generarPregunta(plantilla, y) {
    var respuesta = JSON.parse(y.respuestas);

    // Asigna el enunciado
    plantilla.getElementsByClassName("enunciado-container")[0].innerHTML = y.enunciado;

    // Recorre las respuestas y agrega un input de tipo radio antes de cada una
    for (var i = 0; i < respuesta.length; i++) {
        for (var j = 0; j < 3; j++) {

            plantilla.getElementsByClassName("radio")[j].name="s"+i+"d"+j;
            console.log(plantilla.getElementsByClassName("radio")[j].name);
        }
        var respuestaText = document.createElement("span");
        respuestaText.innerHTML = respuesta[i].Enunciado;
        plantilla.getElementsByClassName("respuesta")[i].appendChild(respuestaText);
        
    }


    // Agrega la plantilla al cuerpo del documento
    document.body.appendChild(plantilla);
}

