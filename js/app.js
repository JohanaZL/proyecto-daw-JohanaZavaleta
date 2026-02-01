document.addEventListener("DOMContentLoaded", () => {
    const boton = document.getElementById("btnSaludo");
    if (boton) {
        boton.addEventListener("click", () => {
            alert("Hola desde app.js - Proyecto DAW de Johana Zavaleta");
        });
    }
});