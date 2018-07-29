<?php
require_once("../conecta.php");
require_once("../utils.php");

$id = fromPost("id");
$senha = MD5(fromPost("senha"));

$query = "DELETE FROM tweets WHERE id = '$id' AND (SELECT id FROM usuarios WHERE usuarios.senha = '$senha')";

$result = $conn->query($query);
if (!$result){
  $resposta['error'] = "Ops, ocorreu um erro! Reinicie a pagina e tente novamente."; 
  echo json_encode($resposta);
} else {
  $resposta['sucesso'] = "Tweet excluido";
  echo json_encode($resposta);
}
$conn->close();
?>
