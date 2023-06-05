document.addEventListener("DOMContentLoaded", () => {
    let botonesMenos = document.getElementsByClassName("menos");

    for (let menos of botonesMenos) {
        menos.addEventListener("click", () => {
            menos.parentNode.nextElementSibling.value--
        })
    }

    let botonesMas = document.getElementsByClassName("mas");
    for (let mas of botonesMas) {
        mas.addEventListener("click", () => {
            mas.parentNode.previousElementSibling.value++
        })
    }
})