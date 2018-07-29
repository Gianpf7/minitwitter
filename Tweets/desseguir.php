<?php
require_once("../conecta.php");
require_once("../utils.php");

$seguidor = fromPost("id_seguidor");
$user = fromPost("id_usuario");
date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:m');

$query = "DELETE FROM seguir WHERE id_usuario = '$user' AND id_seguidor = '$seguidor'";
$result = $conn->query($query);
echo $query;
if (!$result){
    $retorno['error'] = "Ops, não foi possível desseguir este usuário";
    echo json_encode($retorno);
} else {
    $retorno['sucesso'] = "Você não está mais seguindo esta pessoa.";
    echo json_encode($retorno);
}
$conn->close();
?>
