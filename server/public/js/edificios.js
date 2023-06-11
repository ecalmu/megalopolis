document.addEventListener("DOMContentLoaded", () => {
    let botonesConstruir = document.getElementsByClassName("construir");

    for (let boton of botonesConstruir) {
        boton.addEventListener("click", () => {
            let barraProgreso = document.createElement('div');
            barraProgreso.className = 'progress progreso';
            barraProgreso.innerHTML = '<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>';

            boton.replaceWith(barraProgreso);

            let edificio = barraProgreso.nextElementSibling.value;

            let data = {
                id_tipo: edificio
            };

            fetch('http://localhost:8080/construir', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id_tipo='+ edificio
            })
            actualizarProgreso(barraProgreso);
        })
    }
    
    let barrasProgreso = document.getElementsByClassName("progreso");
    if (barrasProgreso.length > 0) {
        for (let barra of barrasProgreso) {
            actualizarProgreso(barra);
        }
    }

    function actualizarProgreso(barra) {
        let tiempoConstruccion = barra.previousElementSibling.lastElementChild.lastElementChild.textContent;
        let horas = tiempoConstruccion.slice(0, 2);
        let minutos = tiempoConstruccion.slice(4, 6);
        let segundos = tiempoConstruccion.slice(10, 12);
        let tiempoTotal = 0;
        let progreso = parseFloat(barra.children[0].style.width);

        let actualizacion = setInterval(() => {
            if (segundos > 0) {
                segundos--
            } else {
                minutos--
                segundos = "59"
                if (minutos < 0) {
                    minutos = "00";
                    horas--
                    if (horas < 0) {
                        clearInterval(actualizacion);
                    }
                }
            }

            tiempoTotal = horas * 3600 + minutos * 60 + segundos;

            barra.previousElementSibling.lastElementChild.lastElementChild.textContent = horas + "h " + minutos + "min " + segundos + "seg";
            progreso += (100 / tiempoTotal);

            barra.children[0].style.width = progreso + '%';
        }, 1000);
    }
});