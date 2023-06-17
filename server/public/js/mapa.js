document.addEventListener("DOMContentLoaded",  () => {
    generarMapa();
});


async function generarMapa() {
    try {
        //hago una petición a la API
        let respuesta = await fetch("https://megalopolis.defcomsoftware.com/generarMapa");
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
            nuevaFila.style.transformStyle = "preserve-3d"

            for (let j = 0; j < mapa[i].length; j++) {
                //Creo una nueva columna
                let nuevaColumna = document.createElement("div")
                //Añado la clase col al div
                nuevaColumna.classList.add("col-1")
                nuevaColumna.classList.add("align-items-center")
                nuevaColumna.classList.add("d-flex")
                nuevaColumna.classList.add("justify-content-center")
                nuevaColumna.classList.add("shadow")
                nuevaColumna.classList.add("tooltip")
                nuevaColumna.id = "" + i + j

                nuevaColumna.style.height = "100px";
                // nuevaColumna.title = "Dinero: 500 \nAlimento: 100 \nEnergia:200"

                switch (mapa[i][j].recurso.tipo) {
                    case "Dinero":
                        nuevaColumna.style.backgroundColor = "rgba(255, 255, 51, 0.2)";
                        nuevaColumna.style.backgroundBlendMode = "overlay"
                        nuevaColumna.style.transformStyle = "preserve-3d"
                        break;
                    case "Comida":
                        nuevaColumna.style.backgroundColor = "rgba(255, 100, 51, 0.2)";
                        nuevaColumna.style.backgroundBlendMode = "overlay"
                        nuevaColumna.style.transformStyle = "preserve-3d"
                        break;
                    case "Energia":
                        nuevaColumna.style.backgroundColor = "rgba(51, 212, 255, 0.2)";
                        nuevaColumna.style.backgroundBlendMode = "overlay"
                        nuevaColumna.style.transformStyle = "preserve-3d"
                        break;
                }
                
                let tieneCiudad = false;
                for (let a = 0; a < mapa.length; a++) {
                    for (let b = 0; b < mapa[a].length; b++) {
                        if(mapa[a][b].id == mapa[a][b].id_actual) {
                            tieneCiudad = true;
                        }
                    }

                }
                if (mapa[i][j].ocupacion == 0) {
                    let mostrarBoton = false;
                    for (let fila = i - 1; fila <= i + 1; fila++) {
                        for (let columna =  j - 1; columna <= j + 1; columna++) {
                            if (fila >= 0 && fila <= 6 && columna >= 0 && columna <= 11){
                                if ((mapa[fila][columna].ocupacion == 1 || mapa[fila][columna].ocupacion == 2)&& mapa[fila][columna].id == mapa[fila][columna].id_actual) {
                                    mostrarBoton = true;
                                }
                            }
                        }
                    }
                    if (mostrarBoton || !tieneCiudad) {
                        nuevaColumna.innerHTML += "<span class='tooltiptext rotacionTooltip' id=tooltip" + i + j + " >" + mapa[i][j].recurso.tipo + ": " + mapa[i][j].recurso.cantidad + " <button class='btn btn btn-primary pr-1 pl-1' id=seleccionar" + i + j + ">Seleccionar</button> </span>"
                    } else {
                        nuevaColumna.innerHTML += "<span class='tooltiptext rotacionTooltip' id=tooltip" + i + j + " >" + mapa[i][j].recurso.tipo + ": " + mapa[i][j].recurso.cantidad + " </span>"
                    }
                    
                } else {
                    nuevaColumna.innerHTML += "<span class='tooltiptext rotacionTooltip' id=tooltip" + i + j + " >" + mapa[i][j].usuario + "</span>"
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
                        let tooltipS = document.getElementById(tooltipS);
                        tooltipS.style.visibility = "hidden";
                    }
                    fondoCelda = nuevaColumna.style.backgroundImage;
                    nuevaColumna.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
                    nuevaColumna.style.backgroundImage = "";

                    let tooltip = document.getElementById("tooltip" + i + j);
                    tooltip.style.visibility = "visible";

                    tooltip.children[0].addEventListener("click", () => {
                        // Envío de la petición al servidor PHP
                        fetch('https://megalopolis.defcomsoftware.com/guardarPosicion', {
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
                        //Recargo la página para que aparezca la ciudad o puesto comercial creado
                        setTimeout(function() {
                            window.location.href = '/mapa';
                        }, 500);
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