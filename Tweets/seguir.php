<?php
require_once("../conecta.php");
require_once("../utils.php");

$seguidor = fromPost("id_seguidor");
$user = fromPost("id_usuario");
date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:m');

$query = "SELECT * FROM seguir WHERE id_usuario = '$user' AND id_seguidor = '$seguidor'";
$result = $conn->query($query);
if($result){
    $retorno['err'] = "Você já segue esta pessoa!";
    echo json_encode($retorno);
    die();
}
$query = "INSERT INTO seguir(id_usuario, id_seguidor, data) VALUES ('$user', '$seguidor', '$data')";
$result = $conn->query($query);
if (!$result){
    $retorno['error'] = "Ops, não foi possível seguir este usuário";
    echo json_encode($retorno);
} else {
    $retorno['sucesso'] = "Parabéns, a  gora você está seguindo esta pessoa.";
    echo json_encode($retorno);
}
$conn->close();
?>
