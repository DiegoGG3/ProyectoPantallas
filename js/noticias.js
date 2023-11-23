
document.addEventListener('DOMContentLoaded', function() {
    const crear=document.getElementById("crear");
   

    document.getElementById('recurso').addEventListener('change', function() {
        var recursoSeleccionado = this.value;
        var formularioInsert = document.getElementById('recursos');

        // Crear un nuevo elemento <p> con el contenido dinámico
        var nuevoContenido = document.createElement('label');


        switch(recursoSeleccionado) {
            case 'Web':
                nuevoContenido.textContent = 'Insert para la opción Web ';
                var nuevoInput = document.createElement('input');
                nuevoInput.id="enlace";
                
                
                break;
            case 'Imagen':
                nuevoContenido.textContent = 'Seleccionar imagen ';
                var nuevoInput = document.createElement('input');
                nuevoInput.type="file";
                nuevoInput.id="imagen";

                break;
            case 'Video':
                nuevoContenido.textContent = 'Insert para la opción Video ';
                var nuevoInput = document.createElement('input');
                nuevoInput.type="file";
                nuevoInput.id="video";

                break;
        }

        formularioInsert.innerHTML = ''; 
        formularioInsert.appendChild(nuevoContenido);
        formularioInsert.appendChild(nuevoInput);

    });

    crear.onclick=function(ev){
        var arrayInput=document.getElementsByTagName('input');
        var valueInput=new Array();
    
    
        for(var i=0;i<arrayInput.length;i++){
            valueInput.push(arrayInput[i].value);
        }
        valueInput.pop();
        valueInput.push(document.getElementById('perfil').value);
        valueInput.push(document.getElementById('recursos').childNodes[1].id);

        console.log(valueInput);
    
        ev.preventDefault();
        
        var formularioInsert = document.getElementById('recursos').childNodes[1].id;

        switch(formularioInsert) {
            case 'enlace':
                var fichero=document.getElementById("enlace").value;
                    if (fichero) {
                        var form = new FormData();
                        form.append("fichero", fichero);
                        for (var i = 0; i < valueInput.length; i++) {
                            form.append("valueInput[]", valueInput[i]);
                        }
                        fetch("./api/apicrearNoticia.php", {
                            method: "post",
                            body: form
                        }).then(x => x.text()).then(texto => {
                            alert("Archivo introducido correctamente");

                            // location.reload();
                        });
                    } else {
                        alert("Debe seleccionar un archivo");
                    }

                
                break;
            case 'imagen':
                var ficheroInput = document.getElementById("imagen");
                var fichero = ficheroInput.files[0];
                if (fichero) {
                    var form = new FormData();
                    form.append("fichero", fichero);
                    for (var i = 0; i < valueInput.length; i++) {
                        form.append("valueInput[]", valueInput[i]);
                    }
                    fetch("./api/apicrearNoticia.php", {
                        method: "post",
                        body: form
                    }).then(x => x.text()).then(texto => {
                        alert("Archivo introducido correctamente");

                        // location.reload();
                    });
                } else {
                    alert("Debe seleccionar un archivo");
                }
                break;
            case 'video':
                var ficheroInput=document.getElementById("video");
                var fichero = ficheroInput.files[0];
                if (fichero) {
                    var form = new FormData();
                    form.append("fichero", fichero);
                    for (var i = 0; i < valueInput.length; i++) {
                        form.append("valueInput[]", valueInput[i]);
                    }
                    fetch("./api/apicrearNoticia.php", {
                        method: "post",
                        body: form
                    }).then(x => x.text()).then(texto => {
                        alert("Archivo introducido correctamente");

                        // location.reload();
                    });
                } else {
                    alert("Debe seleccionar un archivo");
                }
                break;
        }


        
    }
});
