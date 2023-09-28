export function addEventListener(input, alerta) {
    input.addEventListener("input", function () {
        if (input.value !== "") {
            alerta.style.display = "none";
        }
    });
}