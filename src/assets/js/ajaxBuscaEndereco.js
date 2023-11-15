window.onload = function () {
    const inputCep = document.querySelector("#cep");
    inputCep.onkeyup = () => buscaEndereco(inputCep.value);
}

function buscaEndereco(cep) {
      
    if (cep.length != 9) return;      
    let form = document.querySelector("form");
    
    fetch("../../Back-End/buscaEndereco.php?cep=" + cep)
      .then(response => {
        if (!response.ok) {
          throw new Error(response.status);
        }
        return response.json();
      })
      .then(endereco => {
        form.logradouro.value = endereco.logradouro;
        form.cidade.value = endereco.cidade;
        form.estado.value = endereco.estado;
      })
      .catch(error => {
        //form.reset();
        console.error('Falha inesperada: ' + error);
      });
  }

