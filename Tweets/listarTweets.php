<?php
require_once("../conecta.php");
require_once("../utils.php");

if(isset($_POST['id_usuario'])){
    $id_usuario = fromPost("id_usuario");
    $query = "SELECT * FROM tweets WHERE id_usuario = '$id_usuario'";
} else if (isset($_POST['id_timeline'])){
    $timeline = fromPost("id_timeline");
    $query = "SELECT * FROM tweets INNER JOIN seguir ON tweets.id_usuario = seguir.id_usuario AND seguir.id_seguidor = '$timeline'";
}

$result = $conn->query($query);
if (!$result){
    $retorno['erro'] = "Ops, ocorreu um erro! Reinicie a pagina e tente novamente";
    echo json_encode($retorno);
} else {
    $tweets = array();
    while ($tweet = $result->fetch_array(MYSQLI_ASSOC) ) {
        $tweets[] = $tweet;
    }
    echo json_encode($tweets);
}
$conn->close();
?>
