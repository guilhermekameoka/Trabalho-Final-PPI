document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("login");
    
    const emailInput = document.getElementById("email");
    const senhaInput = document.getElementById("senha");
    const alertaEmail = document.getElementById("alertaEmail");
    const alertaSenha = document.getElementById("alertaSenha");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        alertaEmail.style.display = "none";
        alertaSenha.style.display = "none";

        if (emailInput.value === "") {
            alertaEmail.style.display = "block";
        }
        if (senhaInput.value === "") {
            alertaSenha.style.display = "block";
        }
    });

    emailInput.addEventListener("input", function () {
        if (emailInput.value !== "") {
            alertaEmail.style.display = "none";
        }
    });

    senhaInput.addEventListener("input", function () {
        if (senhaInput.value !== "") {
            alertaSenha.style.display = "none";
        }
    });
});