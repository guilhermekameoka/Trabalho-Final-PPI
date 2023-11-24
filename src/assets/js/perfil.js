let foto = document.getElementById("fotoPerfil");

document.getElementById('insereImg').addEventListener('change', function() {
  const arquivo = this.files[0]; // Obtém o arquivo de imagem selecionado

  if (arquivo) {
      const leitor = new FileReader(); // Cria um leitor de arquivo

      leitor.onload = function(e) {
          // const imagem = document.getElementById('imagemExibida');
          foto.src = e.target.result; 
          foto.style.display = 'block'; // Exibe a imagem
      }

      leitor.readAsDataURL(arquivo); // Converte o arquivo para uma URL de dados legível
  }
});

