document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const nomeInput = document.getElementById("nome");
        const emailInput = document.getElementById("email");
        const cpfInput = document.getElementById("cpf");
        const idadeInput = document.getElementById("idade");
        const ruaInput = document.getElementById("rua");
        const bairroInput = document.getElementById("bairro");
        const cidadeInput = document.getElementById("cidade");
        const estadoSelect = document.getElementById("estado");

        const alertaNome = document.getElementById("alertaNome");
        const alertaEmail = document.getElementById("alertaEmail");
        const alertaCpf = document.getElementById("alertaCpf");
        const alertaIdade = document.getElementById("alertaIdade");
        const alertaRua = document.getElementById("alertaRua");
        const alertaBairro = document.getElementById("alertaBairro");
        const alertaCidade = document.getElementById("alertaCidade");
        const alertaEstado = document.getElementById("alertaEstado");

        form.addEventListener("submit", function (event) {
            event.preventDefault();

            alertaNome.style.display = "none";
            alertaEmail.style.display = "none";
            alertaCpf.style.display = "none";
            alertaIdade.style.display = "none";
            alertaRua.style.display = "none";
            alertaBairro.style.display = "none";
            alertaCidade.style.display = "none";
            alertaEstado.style.display = "none";

            if (nomeInput.value === "") {
                alertaNome.style.display = "block";
            }
            if (emailInput.value === "") {
                alertaEmail.style.display = "block";
            }
            if (cpfInput.value === "") {
                alertaCpf.style.display = "block";
            }
            if (idadeInput.value === "") {
                alertaIdade.style.display = "block";
            }
            if (ruaInput.value === "") {
                alertaRua.style.display = "block";
            }
            if (bairroInput.value === "") {
                alertaBairro.style.display = "block";
            }
            if (cidadeInput.value === "") {
                alertaCidade.style.display = "block";
            }
            if (estadoSelect.value === "") {
                alertaEstado.style.display = "block";
            }
        });

        nomeInput.addEventListener("input", function () {
            if (nomeInput.value !== "") {
                alertaNome.style.display = "none";
            }
        });

        emailInput.addEventListener("input", function () {
            if (emailInput.value !== "") {
                alertaEmail.style.display = "none";
            }
        });

        cpfInput.addEventListener("input", function () {
            if (cpfInput.value !== "") {
                alertaCpf.style.display = "none";
            }
        });

        idadeInput.addEventListener("input", function () {
            if (idadeInput.value !== "") {
                alertaIdade.style.display = "none";
            }
        });

        ruaInput.addEventListener("input", function () {
            if (ruaInput.value !== "") {
                alertaRua.style.display = "none";
            }
        });

        bairroInput.addEventListener("input", function () {
            if (bairroInput.value !== "") {
                alertaBairro.style.display = "none";
            }
        });

        cidadeInput.addEventListener("input", function () {
            if (cidadeInput.value !== "") {
                alertaCidade.style.display = "none";
            }
        });

        estadoSelect.addEventListener("change", function () {
            if (estadoSelect.value !== "") {
                alertaEstado.style.display = "none";
            }
        });
    });
