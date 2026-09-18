<?php
require 'classe/Produto.class.php';
require 'classe/Imagem.class.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $desc = $_POST['desc'];
    $valor = $_POST['valor'];
    $fotos = $_FILES['foto'];

    $p = new Produto();
    $conectou = $p->conecta();

    if($conectou) {
        $id_produto = $p->enviarProduto($nome, $valor, $desc, $fotos);

        if($id_produto){
            header("Location: produtos.php?sucesso=1");
            exit; 
        }else{
            header("Location: produtos.php?erro=1");
            exit;
        }
    }else {
        header("Location: produtos.php?erro=conexao");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastre um produto!</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nome">Nome do produto!</label>
            <input type="text" name="nome">
            <label for="desc">Descricao</label>
            <textarea name="desc" id=""></textarea>
            <label for="valor">Valor</label>
            <input type="text" name= "valor">
            <label for="env"></label>
            <input type="file" name="foto[]" id="foto-upload" multiple>
            <div id="preview-container"></div>

            <input type="submit" id= "botao" value="CADASTRAR" multiple>
            <a href="produtoEstatico.php" class = "aaa"><input type="button" value="PRODUCTS" id="products"></a>
        </form>
        
    </div>


        





    <script>
    const inputFile = document.getElementById('foto-upload');
    const previewContainer = document.getElementById('preview-container');

    inputFile.addEventListener('change', function() {
        previewContainer.innerHTML = '';
        for (const file of this.files) {
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.classList.add('preview-image');
                previewContainer.appendChild(img);
            }
        }
    });
</script>
</body>
</html>