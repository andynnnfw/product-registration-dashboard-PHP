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
                <img src="uploads/<?=  rawurldecode($imagem['nome_img']) ?>" alt="<?= htmlspecialchars($imagem['nome_produto'] ?? 'Produto') ?>">
            <?php endforeach ; ?>
        <?php endif ; ?>
        
    </section>
</body>
</html>