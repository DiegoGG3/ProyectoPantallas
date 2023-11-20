
  function crearPregunta(boton) {
    var enunciado = document.getElementById("enunciado").value;
    var categoria = document.getElementById("categoria").value;
    var dificultad = document.getElementById("dificultad").value;
    var buena = document.getElementById("buena").value;

    var respuestas = [];
    var letra;
    for (var i = 1; i <= 3; i++) {
      switch (i) {
        case 1:
          letra="A";
          break;
        case 2:
          letra="B";

          break;
        case 3:
          letra="C";

          break;
      }
        var respuestaInput = document.getElementById(i);
        respuestas.push({
            IdRespuesta: i,
            ValorRespuesta: letra,
            Enunciado: respuestaInput.value, 
            Correcta: i == buena
        });
    }

    var preguntaData = {
        Enunciado: enunciado,
        Respuestas: JSON.stringify(respuestas),
        Categoria: categoria,
        Dificultad: dificultad,
        Tipo_recurso: null,
        url: null
    };

    fetch('api/apiCrearPregunta.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({"preguntaData":preguntaData})

    })
  .then(response => response.text())
  .then(data => {
      location.reload();
  });
  
}
