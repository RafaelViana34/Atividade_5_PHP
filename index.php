<?php
// A sessão deve ser iniciada antes de qualquer saída HTML
session_start();

// Inicializa o estoque na sessão (somente na primeira visita)
if (!isset($_SESSION['estoque'])) {
    $_SESSION['estoque'] = 20;
}

// Quando o formulário é enviado (POST), o estoque diminui no servidor.
// Depois da compra, redireciona (evita reenviar o formulário ao atualizar a página).
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comprar'])) {
    if ($_SESSION['estoque'] > 0) {
        $_SESSION['estoque']--;
        header('Location: obrigado.php');
    } else {
        header('Location: esgotado.php');
    }
    exit;
}

// Todo número de estoque exibido nesta página vem da variável de sessão
$estoque = (int) $_SESSION['estoque'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Boné Exclusivo Código Fonte</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
  <header>
    <nav>
      <div class="logo">Código <span>Fonte</span></div>
      <ul>
        <li><a href="#sobre">Sobre o Boné</a></li>
        <li><a href="#detalhes">Detalhes</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="#comprar" class="nav-comprar">Comprar Agora</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero -->
  <section id="sobre" class="hero">
    <div>
      <h1>Boné Exclusivo do Código Fonte</h1>
      <p>Edição limitada com apenas <?php echo $estoque; ?> unidades disponíveis. Um item de colecionador para desenvolvedores e fãs da cultura dev.</p>
      <button class="btn" data-scroll="comprar">Garanta o Seu Agora</button>
    </div>
    <div>
      <img src="https://images.unsplash.com/photo-1516826957135-700dedea698c?q=80&w=1200" alt="Gabriel e Vanessa usando o boné">
    </div>
  </section>

  <!-- Detalhes -->
  <section id="detalhes" class="detalhes">
    <h2>Detalhes do Produto</h2>
    <p>Boné de alta qualidade, design moderno e confortável. Produzido com materiais premium.</p>
    <div class="carrossel">
      <button class="prev">&#10094;</button>
      <img id="carrossel-img" src="https://images.unsplash.com/photo-1520975916090-3105956dac38?q=80&w=1200" alt="Imagem do boné">
      <button class="next">&#10095;</button>
    </div>
  </section>

  <!-- Exclusividade -->
  <section class="exclusivo">
    <h2>Exclusividade Garantida</h2>
    <p>Apenas <strong><?php echo $estoque; ?> unidades</strong> disponíveis. Não perca a chance de ter o seu!</p>
    <button class="btn" data-scroll="comprar">Comprar Agora</button>
  </section>

  <!-- FAQ -->
  <section id="faq" class="faq">
    <h2>Perguntas Frequentes</h2>
    <details>
      <summary>Qual o material do boné?</summary>
      <p>Produzido com tecido premium de alta durabilidade.</p>
    </details>
  </section>

  <!-- Comprar -->
  <section id="comprar" class="comprar">
    <h2>Garanta o Seu Agora</h2>
    <p><strong>R$ 99,00</strong> — em até 2x sem juros. Frete grátis para todo Brasil.</p>

    <p>Estoque atual: <?php echo $estoque; ?></p>

    <?php if ($estoque > 0): ?>
      <form method="POST" action="">
        <input type="hidden" name="comprar" value="1">
        <button class="btn" type="submit">Comprar Agora</button>
      </form>
    <?php else: ?>
      <button class="btn" disabled>Esgotado</button>
    <?php endif; ?>
  </section>

  <footer>
    <p>Siga o Código Fonte TV</p>
    <a href="https://youtube.com/@codigofontetv" target="_blank">YouTube</a> |
    <a href="https://instagram.com/codigofontetv" target="_blank">Instagram</a>
  </footer>

  <script src="js/script.js"></script>
</body>
</html>
