export function checaValorInput(input, alerta) {
    input.addEventListener("input", function () {
        if (input.value !== "") {
            alerta.style.display = "none";
        }
    });
}