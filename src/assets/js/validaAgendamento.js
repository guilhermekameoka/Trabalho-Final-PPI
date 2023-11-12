import { validaInput } from "./validaInput.js";
import { checaValorInput } from "./checaValorInput.js";

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    const campos = [
        { input: document.getElementById("nome"), alerta: document.getElementById("alertaNome") },
        { input: document.getElementById("email"), alerta: document.getElementById("alertaEmail") },
        { input: document.getElementById("especialidade"), alerta: document.getElementById("alertaEspecialidade") },
        { input: document.getElementById("data-nascimento"), alerta: document.getElementById("alertaDataNascimento") },
        { input: document.getElementById("nomeProfissional"), alerta: document.getElementById("alertaNomeProfissional") },
        { input: document.getElementById("telefone"), alerta: document.getElementById("alertaTelefone") },
        { input: document.getElementById("data"), alerta: document.getElementById("alertaData") },
        { input: document.getElementById("horario"), alerta: document.getElementById("alertaHorario") },
        { input: document.getElementById("convenio"), alerta: document.getElementById("alertaConvenio") },
        { input: document.getElementById("sexo"), alerta: document.getElementById("alertaSexo") }
    ];

    form.addEventListener("submit", function (event) {
        let formValido = true;

        campos.forEach(({ input, alerta }) => {
            if (!validaInput(input, alerta)) {
                event.preventDefault();
                formValido = false;
            }
        });

        if (formValido) {
            form.submit();
        }
    });

    campos.forEach(({ input, alerta }) => {
        checaValorInput(input, alerta);
    });
});