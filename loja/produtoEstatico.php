<?php
require 'classe/Imagem.class.php';

$img = new Imagem();
$imagens = [];

if ($img->conecta()){
    $imagens = $img->mostrarTodasImagens();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produtoStyle.css">
    <title>products </title>
</head>
<body>
    <section>
        <?php if(empty($imagens)) : ?>
            <p>Nenhuma imagem cadastrada ainda.</p>
        <?php  else: ?>
            <?php foreach ($imagens as $imagem) : ?>
                <div class="produto-card">
                    <img src="uploads/<?= rawurldecode($imagem['nome_img']) ?>" alt="<?= htmlspecialchars($imagem['nome_produto'] ?? 'Produto') ?>">
                    
                    <h2 style="color: white;"><?= htmlspecialchars($imagem['nome_produto'] ?? 'Produto sem nome') ?></h2>
                    <p style="color: white;"><strong>Preço:</strong> R$ <?= number_format((float)($imagem['valor'] ?? 0), 2, ',', '.') ?></p>
                    <p style="color: white;"><strong>Descrição:</strong> <?= htmlspecialchars($imagem['descricao'] ?? 'Sem descrição informada.') ?></p>
                </div>
            <?php endforeach ; ?>
        <?php endif ; ?>
        
    </section>
</body>
</html>