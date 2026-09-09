<?php
class Imagem {
    private $pdo;

    public function setConexao($pdo){
        $this->pdo = $pdo;
    }

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

    public function enviaImagem($id_produto, $fotos){
        $pastaDestino = "uploads/";

        $total = count($fotos['name']);

        for ($i = 0; $i < $total; $i++){
            if ($fotos['error'][$i] == UPLOAD_ERR_OK){
                $nomeOriginal = $fotos['name'][$i];
                $tmpNome = $fotos['tmp_name'][$i];

                $nomeFinal = uniqid() . "_" . $nomeOriginal;
                $caminhoFinal = $pastaDestino . $nomeFinal;

                if (move_uploaded_file($tmpNome, $caminhoFinal)){
                    $sql = "INSERT INTO imagem SET nome_img = :n, fk_id_produto = :id";
                    $sql = $this->pdo->prepare($sql);
                    $sql->bindValue(":n", $nomeFinal);
                    $sql->bindValue(":id", $id_produto);
                    $sql->execute();
                }
            }
        }
    }

    public function mostraImagem($id_produto){
        $sql = "SELECT * FROM imagem WHERE fk_id_produto = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id_produto);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function apagaImagem($id_imagem, $pastaDestino = "uploads/"){
        $sql = $this->pdo->prepare("SELECT nome_img FROM imagem WHERE id_imagem = :id");
        $sql->bindValue(":id", $id_imagem);
        $sql->execute();

        $img = $sql->fetch(PDO::FETCH_ASSOC);

        if ($img && file_exists($pastaDestino . $img['nome_img'])){
            unlink($pastaDestino . $img['nome_img']);
        }

        $del = $this->pdo->prepare("DELETE FROM imagem WHERE id_imagem = :id");
        $del->bindValue(":id", $id_imagem);
        return $del->execute();
    }
}
?>