export function validaInput(input, alerta) {
    let formValido;

    if (input.value === "") {
        alerta.style.display = "block";
        formValido = false;
    } else {
        alerta.style.display = "none";
        formValido = true;
    }

    return formValido;
}