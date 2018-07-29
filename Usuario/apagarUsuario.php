<?php
require_once('../conecta.php');
require_once('../utils.php');

$id = fromPost("id");
$senha = md5(fromPost("senha"));

$query = "DELETE FROM usuarios WHERE id = '$id' AND senha ='$senha';";

$result = $conn->query($query);
if (!$result) die($conn->error);
if(!$result){
  $retorno['error'] = "Ops, algo deu errado. Atualize a pagina e tente novamente";
  echo json_encode($retorno);
} else {
  $retorno['sucesso'] = "Usuario excluido com sucesso.";
  echo json_encode($retorno);
}
?>
