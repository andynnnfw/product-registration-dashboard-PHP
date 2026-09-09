<?php
require 'classe/Produto.class.php';
$p = new Produto();
$conn = $p->conecta();

if ($conn){
    echo "<h1> conectado! </h1?";
}else {
    echo "<h1> erro </h1>";
}

?>