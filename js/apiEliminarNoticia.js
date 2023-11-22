function eliminarNoticia(boton){

  var idNoticia=boton.parentNode.parentNode.childNodes[1].id;

  fetch('api/apiEliminarNoticia.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
  },
  body: JSON.stringify({"idNoticia":idNoticia})//Aqui se pasa la id.
  })
  .then(response => response.text())
  .then(data => {
    location.reload();
  });
}
