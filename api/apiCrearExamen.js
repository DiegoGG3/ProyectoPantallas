function crearExamen(boton){

    var arrayCheckbox=document.getElementsByTagName('input');
    var idPreguntas=new Array();

    for(var i=0;i<arrayCheckbox.length;i++){
        if(arrayCheckbox[i].checked){
          idPreguntas.push(arrayCheckbox[i].id);
        }
    }


    fetch('api/apiCrearExamen.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({"idPreguntas":idPreguntas})
    })
    .then(response => response.text())
    .then(data => {
      location.reload();

    });
  }
