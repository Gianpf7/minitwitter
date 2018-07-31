<?php
require_once("../conecta.php");
require_once("../utils.php");

  $id_tweet = fromPost("id_tweet");
  $id_usuario = fromPost("id_usuario");
  $react = fromPost("react");
  $query = "SELECT * FROM reacts WHERE id_tweet = '$id_tweet' AND id_usuario = '$id_usuario'";
  $result = $conn->query($query);
  if($result){
    $query = "UPDATE reacts SET react = '$react' WHERE id_tweet = '$id_tweet' AND id_usuario = '$id_usuario'";
  } else{
    $query = "INSERT INTO reacts(id_tweet, id_usuario, react) VALUES ($id_tweet, $id_usuario, $react)";
  }
  $result = $conn->query($query);
  if (!$result){
    $retorno['error'] = "Não foi possível reagir a este comentário, certifique-se que esteja logado.";
    echo json_encode($retorno);
  } else {
    $retorno['sucesso'] = $react;
    echo json_encode($retorno);
  }
  $conn->close();

?>
