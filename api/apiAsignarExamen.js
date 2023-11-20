function asignarExamen(boton){

  var idExamen=boton.parentNode.parentNode.childNodes[1].id;
  var idAlumno=boton.parentNode.parentNode.childNodes[5].childNodes[1].value;

  fetch('api/apiAsignarExamen.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
  },
  body: JSON.stringify({"idAlumno":idAlumno, "idExamen":idExamen})//Aqui se pasa la id.
  })
  .then(response => response.text())
  .then(data => {
    location.reload();
  });
}
