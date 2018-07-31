<?php
require_once("../conecta.php");
require_once("../utils.php");

  $id_tweet = fromPost("id_tweet");
  $id_usuario = fromPost("id_usuario");
  $react = fromPost("react");
  $query = "DELETE FROM reacts WHERE id_tweet = '$id_tweet' AND id_usuario = '$id_usuario'";
  $result = $conn->query($query);
  if (!$result){
    retorno['error'] = "Você ainda não reagiu a este comentário, ou não está logado.";
    echo json_encode($retorno);
  } else {
    retorno['sucesso'] = $react;
    echo json_encode(retorno);
  }
  $conn->close();

?>
