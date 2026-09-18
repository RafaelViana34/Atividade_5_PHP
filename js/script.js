// Carrossel de imagens da seção "Detalhes do Produto".
// Obs.: o estoque NÃO é controlado aqui. Ele vive na sessão do PHP ($_SESSION['estoque']).

const imagens = [
  "https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=1200",
  "https://images.unsplash.com/photo-1516820580870-3f66c730d990?q=80&w=1200",
  "https://images.unsplash.com/photo-1507838153414-b4b713384a76?q=80&w=1200"
];

let indice = 0;

const imagemCarrossel = document.getElementById("carrossel-img");
const botaoAnterior = document.querySelector(".carrossel .prev");
const botaoProximo = document.querySelector(".carrossel .next");

function mostrarSlide() {
  imagemCarrossel.src = imagens[indice];
}

function nextSlide() {
  indice = (indice + 1) % imagens.length;
  mostrarSlide();
}

function prevSlide() {
  indice = (indice - 1 + imagens.length) % imagens.length;
  mostrarSlide();
}

botaoAnterior.addEventListener("click", prevSlide);
botaoProximo.addEventListener("click", nextSlide);

// Botões com o atributo data-scroll="id-da-secao" rolam suavemente até a seção.
document.querySelectorAll("[data-scroll]").forEach(function (botao) {
  botao.addEventListener("click", function () {
    const destino = document.getElementById(botao.dataset.scroll);
    if (destino) {
      destino.scrollIntoView({ behavior: "smooth" });
    }
  });
});
