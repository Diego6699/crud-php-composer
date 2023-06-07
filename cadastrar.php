<?php
require __DIR__."/vendor/autoload.php";
//validacao do post
if(isset($_POST['titulo'] ,$_POST['descricao'],$_POST['ativo'])){
    die("cadastrar");
}
include __DIR__."/includes/header.php";
include __DIR__."/includes/formulario.php";
include __DIR__."/includes/footer.php";