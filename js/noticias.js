
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
        ev.preventDefault();
        
        var formularioInsert = document.getElementById('recursos').childNodes[1].id;

        switch(formularioInsert) {
            case 'enlace':
                var fichero=document.getElementById("enlace").value;
                if (fichero.files.length>0){
                    var form= new FormData();
                    form.append("fichero",fichero.files[0]);
                    fetch("crearNoticia.php",{
                        method:"post",
                        body:form
                    }).then(x=>x.text()).then(texto=>{alert(texto)});
                
                }else{
                    alert("Debe de introducir un fichero");
                }

                
                break;
            case 'imagen':
                var fichero=document.getElementById("imagen").value;
                console.log(fichero);
                break;
            case 'video':
                var fichero=document.getElementById("video").value;
                console.log(fichero);
                break;
        }


        
    }
});
