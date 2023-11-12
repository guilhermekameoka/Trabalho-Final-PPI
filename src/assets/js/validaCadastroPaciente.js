import { validaInput } from "./validaInput.js";
import { checaValorInput } from "./checaValorInput.js";

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    const campos = [
        { input: document.getElementById("nome"), alerta: document.getElementById("alertaNome") },
        { input: document.getElementById("email"), alerta: document.getElementById("alertaEmail") },
        { input: document.getElementById("senha"), alerta: document.getElementById("alertaSenha") },
        { input: document.getElementById("telefone"), alerta: document.getElementById("alertaTelefone") },
        { input: document.getElementById("cpf"), alerta: document.getElementById("alertaCpf") },
        { input: document.getElementById("data-nascimento"), alerta: document.getElementById("alertaDataNascimento") },
        { input: document.getElementById("sexo"), alerta: document.getElementById("alertaSexo") },
        { input: document.getElementById("cep"), alerta: document.getElementById("alertaCep") },
        { input: document.getElementById("rua"), alerta: document.getElementById("alertaRua") },
        { input: document.getElementById("bairro"), alerta: document.getElementById("alertaBairro") },
        { input: document.getElementById("cidade"), alerta: document.getElementById("alertaCidade") },
        { input: document.getElementById("estado"), alerta: document.getElementById("alertaEstado") }
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
