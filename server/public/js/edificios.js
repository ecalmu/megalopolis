document.addEventListener("DOMContentLoaded", () => {
    let botonesConstruir = document.getElementsByClassName("construir");

    for (let boton of botonesConstruir) {
        boton.addEventListener("click", () => {
            const progressBar = document.createElement('div');
            progressBar.className = 'progress';
            progressBar.innerHTML = '<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>';

            boton.replaceWith(progressBar);

            let edificio = progressBar.nextElementSibling.value;

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

            let progreso = 0;
            let tiempoConstruccion = progressBar.previousElementSibling.lastElementChild.lastElementChild.textContent;
            let horas = tiempoConstruccion.slice(0, 2);
            let minutos = tiempoConstruccion.slice(4, 6);
            let segundos = tiempoConstruccion.slice(10, 12);
            let tiempoTotal = 0;

            let actualizarProgreso = setInterval(() => {
                if (segundos > 0) {
                    segundos--
                } else {
                    minutos--
                    segundos = "59"
                    if (minutos < 0) {
                        minutos = "00";
                        horas--
                        if (horas < 0) {
                            clearInterval(actualizarProgreso);
                        }
                    }
                }

                tiempoTotal = horas * 360 + minutos * 60 + segundos;

                progressBar.previousElementSibling.lastElementChild.lastElementChild.textContent = horas + "h " + minutos + "min " + segundos + "seg";
                progreso += (100 / tiempoTotal);

                progressBar.children[0].style.width = progreso + '%';

            }, 1000);
        })
    }

});