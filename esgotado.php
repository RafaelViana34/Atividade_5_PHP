<?php
session_start();

// Sem sessão iniciada não há estoque para exibir: volta para a página inicial
if (!isset($_SESSION['estoque'])) {
    header('Location: index.php');
    exit;
}

$estoque = (int) $_SESSION['estoque'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Produto Esgotado</title>
  <link rel="stylesheet" href="css/mensagem.css">
</head>
<body class="esgotado">
  <div>
    <h1>Produto Esgotado ❌</h1>
    <p>Todos os bonés exclusivos já foram vendidos. Estoque atual: <strong><?php echo $estoque; ?> unidades</strong>.<br> Fique ligado nas próximas edições e novidades do Código Fonte!</p>
    <a class="btn" href="index.php">Voltar para a Página Inicial</a>
  </div>
</body>
</html>
