export function validaInput(input, alerta) {
    if (input.value === "") {
        alerta.style.display = "block";
    } else {
        alerta.style.display = "none";
    }
}