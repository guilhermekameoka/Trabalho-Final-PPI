document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const especialidadeInput = document.getElementById("especialidade");
    const dataInput = document.getElementById("data");
    const horarioInput = document.getElementById("horario");
    const nomeInput = document.getElementById("nome");
    const emailInput = document.getElementById("email");
    const sexoInput = document.getElementById("sexo");

    const alertaEspecialidade = document.getElementById("alertaEspecialidade");
    const alertaData = document.getElementById("alertaData");
    const alertaHorario = document.getElementById("alertaHorario");
    const alertaNome = document.getElementById("alertaNome");
    const alertaEmail = document.getElementById("alertaEmail");
    const alertaSexo = document.getElementById("alertaSexo");


    form.addEventListener("submit", function (event) {
        event.preventDefault();

        alertaEspecialidade.style.display = "none";
        alertaData.style.display = "none";
        alertaHorario.style.display = "none";
        alertaNome.style.display = "none";
        alertaEmail.style.display = "none";
        alertaSexo.style.display = "none";

        if (nomeInput.value === "") {
            alertaNome.style.display = "block";
        }
        if (emailInput.value === "") {
            alertaEmail.style.display = "block";
        }
        if (sexoInput.value === "") {
            alertaSexo.style.display = "block";
        }
        if (especialidadeInput.value === "") {
            alertaEspecialidade.style.display = "block";
        }
        if (dataInput.value === "") {
            alertaData.style.display = "block";
        }
        if (horarioInput.value === "") {
            alertaHorario.style.display = "block";
        }
    });

    especialidadeInput.addEventListener("input", function () {
        if (especialidadeInput.value !== "") {
            alertaEspecialidade.style.display = "none";
        }
    });

    dataInput.addEventListener("input", function () {
        if (dataInput.value !== "") {
            alertaData.style.display = "none";
        }
    });

    horarioInput.addEventListener("input", function () {
        if (horarioInput.value !== "") {
            alertaHorario.style.display = "none";
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

    sexoInput.addEventListener("input", function () {
        if (sexoInput.value !== "") {
            alertaSexo.style.display = "none";
        }
    });

});
