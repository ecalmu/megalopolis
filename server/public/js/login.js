document.addEventListener("DOMContentLoaded", () => {
    let formulario = document.getElementById("formulario")
    
    formulario.addEventListener("submit", (ev) => {
        let recuerdame = document.getElementById("recuerdame");
        
        //Si el checkbox Recuérdame está marcado...
        if (recuerdame.checked) {
            //Obtengo las credenciales del formulario
            let usuario = document.getElementById("nombre").value;
            let pass = document.getElementById("pass").value;
            
            //Calculo la fecha de expiración
            let fechaActual = new Date();
            let fechaExpiracion = new Date(fechaActual.getTime() + 1000 * 60 * 60 * 24 * 365);
    
            // Guardo las credenciales en cookies
            document.cookie = "usuario=" + usuario + "; expires=" + fechaExpiracion.toUTCString();
            document.cookie = "pass=" + pass + "; expires=" + fechaExpiracion.toUTCString();
        } else {
            //Borro las cookies
            let fechaBorrar = new Date(1);
            document.cookie = "usuario=; expires=" + fechaBorrar.toUTCString();
            document.cookie = "pass=; expires=" + fechaBorrar.toUTCString();
    
        }
    });
    
    let arrayCookies = document.cookie.split("; ");
        
        for(let cookie of arrayCookies) {
            //Obtengo por separado el nombre y valor de cada cookie
            let nombreCookie = cookie.split('=')[0];
            let valorCookie = cookie.split('=')[1];
    
            switch(nombreCookie) {
                case "usuario":
                    document.getElementById('nombre').value = valorCookie;
                    recuerdame.checked = true;
                    break;
                case "pass":
                    document.getElementById('pass').value = valorCookie;
                    break;
            }
        }
    })