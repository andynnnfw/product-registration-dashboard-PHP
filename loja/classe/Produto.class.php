<?php
class Produto{
    private $id;
    private $nome;
    private $valor;
    private $descricao;
    private $pdo;

    public function conecta(){
        $dns = "mysql:dbname=loja_etim;host=localhost";
        $user = "root";
        $pass = "";

        try {
            $this->pdo = new PDO($dns, $user, $pass);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function enviarProduto($nome, $valor, $descricao, $fotos = array()){
        $sql = "INSERT INTO produto SET descricao = :d, nome_produto = :n, valor = :v";
        $sql = $this->pdo->prepare($sql);
        $sql ->bindValue(":d", $descricao);
        $sql ->bindValue(":n", $nome);
        $sql ->bindValue(":v", $valor);

        $isOk = $sql->execute();

        if ($isOk == true){
            $id_produto = $this->pdo->LastInsertID();

            if (!empty($fotos['name'][0])){
                $img = new Imagem();
                $img->setConexao($this->pdo);
                $img->enviaImagem($id_produto, $fotos);
            }
            return $id_produto;
        }
        return false;
    }
}
?>