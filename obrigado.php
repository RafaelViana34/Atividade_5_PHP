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
  <title>Obrigado pela sua compra!</title>
  <link rel="stylesheet" href="css/mensagem.css">
</head>
<body>
  <div>
    <h1>Obrigado pela sua compra! 🎉</h1>
    <p>Assim que o pagamento for confirmado, por favor envie um e-mail para <strong>contato@codigofonte.tv</strong> com seus dados para envio.</p>
    <p>Ainda restam <strong><?php echo $estoque; ?> unidades</strong> do boné exclusivo.</p>
    <a class="btn" href="index.php">Voltar para a Página Inicial</a>
  </div>
</body>
</html>
