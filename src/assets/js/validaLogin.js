import { validaInput } from "./validaInput.js";
import { checaValorInput } from "./checaValorInput.js";

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    const campos = [
        { input: document.getElementById("email"), alerta: document.getElementById("alertaEmail") },
        { input: document.getElementById("senha"), alerta: document.getElementById("alertaSenha") }
    ];

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        campos.forEach(({ input, alerta }) => {
            validaInput(input, alerta);
        });
    });

    campos.forEach(({ input, alerta }) => {
        checaValorInput(input, alerta);
    });
});