function eliminarExamen(boton){

  var idExamen=boton.parentNode.parentNode.childNodes[1].id;

  fetch('api/apiEliminarExamen.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
  },
  body: JSON.stringify({"idExamen":idExamen})//Aqui se pasa la id.
  })
  .then(response => response.text())
  .then(data => {
    location.reload();
  });
}
