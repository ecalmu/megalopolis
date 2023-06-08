document.addEventListener("DOMContentLoaded",  () => {
    generarMapa();
});


async function generarMapa() {
    try {
        //hago una petición a la API food-database
        let respuesta = await fetch("http://localhost:8080/generarMapa");
        let mapa = await respuesta.json()


        //obtengo el elmento mapa del DOM
        let contenedor = document.getElementById("mapa");

        //recorro parte del json que me ha devuelto el servidor para obtener todos los recursos
        //y la ocupación de cada posición
        let nuevaFila;
        for (let i = 0; i < mapa.length; i++) {
            //Creo una nueva fila
            nuevaFila = document.createElement("div")
            //añado la clase row a la nueva fila
            nuevaFila.classList.add("row")

            for (let j = 0; j < mapa[i].length; j++) {
                //Creo una nueva columna
                let nuevaColumna = document.createElement("div")
                //Añado la clase col al div
                nuevaColumna.classList.add("col-lg-1")
                nuevaColumna.classList.add("align-items-center")
                nuevaColumna.classList.add("d-flex")
                nuevaColumna.classList.add("justify-content-center")
                nuevaColumna.classList.add("shadow")
                nuevaColumna.classList.add("tooltip")
                nuevaColumna.id = "" + i + j

                nuevaColumna.style.height = "100px";
                // nuevaColumna.title = "Dinero: 500 \nAlimento: 100 \nEnergia:200"

                switch (mapa[i][j].recurso.tipo) {
                    case "dinero":
                        nuevaColumna.style.backgroundColor = "rgba(255, 255, 51, 0.2)";
                        nuevaColumna.style.backgroundBlendMode = "overlay"
                        break;
                    case "comida":
                        nuevaColumna.style.backgroundColor = "rgba(255, 100, 51, 0.2)";
                        nuevaColumna.style.backgroundBlendMode = "overlay"
                        break;
                    case "energia":
                        nuevaColumna.style.backgroundColor = "rgba(51, 212, 255, 0.2)";
                        nuevaColumna.style.backgroundBlendMode = "overlay"
                        break;
                }

                if (mapa[i][j].ocupacion == 0) {
                    nuevaColumna.innerHTML += "<span class='tooltiptext rotacionTooltip' id=tooltip" + i + j + " >" + mapa[i][j].recurso.tipo + ": " + mapa[i][j].recurso.cantidad + " <button class='btn btn btn-primary pr-1 pl-1'>Seleccionar</button> </span>"
                }

                switch (mapa[i][j].ocupacion) {
                    case "1":
                        nuevaColumna.innerHTML += " <img src='./img/ciudad.png' alt='Ciudad' class='rotacionImg' width='80' height='80'>";
                        break;
                    case "2":
                        nuevaColumna.innerHTML += " <img src='./img/puesto-comercial.png' alt='Puesto comercial' class='rotacionImg' width='80' height='80'>";
                        break;
                }

                celdaSeleccionada = null;
                fondoCelda = null;
                tooltipSel = null;
                //añado a la celda un listener para que cuando se haga click:
                nuevaColumna.addEventListener("click", () => {
                    if (celdaSeleccionada != null) {
                        celdaSeleccionada = document.getElementById(celdaSeleccionada)
                        celdaSeleccionada.style.backgroundColor = ""; // Restauro el color de fondo anterior
                        celdaSeleccionada.style.backgroundImage = fondoCelda; // Restauro la imagen de fondo anterior
                        let tooltipS = document.getElementById(tooltipSel);
                        tooltipS.style.visibility = "hidden";
                    }
                    fondoCelda = nuevaColumna.style.backgroundImage;
                    nuevaColumna.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
                    nuevaColumna.style.backgroundImage = "";

                    let tooltip = document.getElementById("tooltip" + i + j);
                    tooltip.style.visibility = "visible";

                    tooltip.children[0].addEventListener("click", () => {
                        alert("hola")

                        // Envío de la petición al servidor PHP
                        fetch('http://localhost:8080/guardarPosicion', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: 'posicion=' + i + ";" + j
                            })
                            .then(function (response) {
                                // Manejar la respuesta del servidor si es necesario
                                console.log(response);
                            })
                            .catch(function (error) {
                                // Manejar errores
                                console.error('Error:', error);
                            });
                    })

                    celdaSeleccionada = nuevaColumna.id
                    tooltipSel = "tooltip" + i + j
                })
                nuevaFila.appendChild(nuevaColumna);

            }
            contenedor.appendChild(nuevaFila);
        }
    } catch (error) {
        console.log("Error: " + error);
    }
}