function aceptarUser(boton){

    var idUser=boton.parentNode.parentNode.childNodes[1].id;
    var rol=boton.parentNode.parentNode.childNodes[7].childNodes[1].value;

    fetch('api/apiAceptar.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({"idUser":idUser, "rol":rol})//Aqui se pasa la id.
    })
    .then(response => response.text())
    .then(data => {
      location.reload();
    });
  }

  function rechazarUser(boton){

    var idUser=boton.parentNode.parentNode.childNodes[1].id;

    fetch('api/apiRechazar.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({"idUser":idUser})//Aqui se pasa la id.
    })
    .then(response => response.text())
    .then(data => {
      location.reload();
    });
  }