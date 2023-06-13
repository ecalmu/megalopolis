document.addEventListener("DOMContentLoaded", () => {

    obtenerActualizacion(); // Obtener las actualizaciones de la API

    async function obtenerActualizacion() {
        try {
            // Hago una petición a la API
            let respuesta = await fetch("http://localhost:8080/calcularIndicadores");
            let indicadores = await respuesta.json();

            let incrementoComida = Math.round(indicadores.comida / 60);
            let incrementoDinero = Math.round(indicadores.dinero / 60);
            let incrementoPob = Math.round(indicadores.poblacion / (24 * 60 * 60));

            setInterval(() =>actualizar(incrementoComida, incrementoDinero, incrementoPob), 1000);
        } catch (error) {
            console.log("Error: " + error);
        }
    }

    function actualizar(incrementoComida, incrementoDinero, incrementoPob) {

        let recursos = document.getElementsByClassName("cantidad");
        let cantidad;
        for (let recurso of recursos) {
            cantidad = parseInt(recurso.textContent);
            switch (recurso.parentNode.firstChild.textContent) {
                case "Comida":
                    recurso.textContent = cantidad + incrementoComida;
                    break;
                case "Dinero":
                    recurso.textContent = cantidad + incrementoDinero;
                    break;
                case "Poblacion":
                    recurso.textContent = cantidad + incrementoPob;
                    break;
            }
        }
    }
});
