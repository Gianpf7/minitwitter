<?php
require_once("../conect.php");
require_once("../util.php");

  $id = fromGet("id");
  echo $id;
  $user = fromGet("user");
  $query = "INSERT INTO avaliacoes(id_usuario, id_filme, avaliacao) VALUES ($user, $id, 1)";
  $result = $conn->query($query);
  if (!$result){
    header("Location: ../index.php?p=entrar");
  } else {
    header("Location: ../index.php?msg=Sucesso");
  }
  $conn->close();

?>
