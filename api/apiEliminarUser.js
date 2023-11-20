function eliminarUser(boton){

  var idUser=boton.parentNode.id;

  fetch('api/apiEliminarUser.php', {
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
