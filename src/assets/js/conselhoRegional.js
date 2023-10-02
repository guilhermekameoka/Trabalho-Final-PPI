document.addEventListener("DOMContentLoaded", function () {
    const especialidadeSelect = document.getElementById("especialidade");

    const crn = document.getElementById("crn");
    const crp = document.getElementById("crp");
    const crm = document.getElementById("crm");

    function mostraConselho() {
        crn.style.display = "none";
        crp.style.display = "none";
        crm.style.display = "none";

        const especialidade = especialidadeSelect.value;

        if (especialidade === "nutricionista") {
            crn.style.display = "block";
        } else if (especialidade === "psicologo") {
            crp.style.display = "block";
        } else if (especialidade === "endocrinologista" || especialidade === "psiquiatra") {
            crm.style.display = "block";
        }
    }

    especialidadeSelect.addEventListener("change", mostraConselho);
    mostraConselho();
});