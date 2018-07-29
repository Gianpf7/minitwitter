<?php
require_once("../conecta.php");
require_once("../utils.php");

$id = fromPost("id");
$texto = fromPost("texto");
if(isset($_FILES['foto'])){
    $foto = $_FILES['foto'];
} else {
    $foto = Null;
}

if(!empty($foto["name"])) {
  // Largura máxima em pixels
  $largura = 1024;
  // Altura máxima em pixels
  $altura = 1024;
  // Tamanho máximo do arquivo em bytes
  $tamanho = 16777216;

  $error = array();

  // Verifica se o arquivo é uma imagem
  if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
    $error["tipo"] = "Isso não é uma imagem.";
  } 

  // Pega as dimensões da imagem
  $dimensoes = getimagesize($foto["tmp_name"]);

  // Verifica se a largura da imagem é maior que a largura permitida
  if($dimensoes[0] > $largura) {
    $error["largura"] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
  }

  // Verifica se a altura da imagem é maior que a altura permitida
  if($dimensoes[1] > $altura) {
    $error["altura"] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
  }
  
  // Verifica se o tamanho da imagem é maior que o tamanho permitido
  if($foto["size"] > $tamanho) {
        $error["peso"] = "A imagem deve ter no máximo ".$tamanho." bytes";
  }

  // Se não houver nenhum erro
  if (count($error) == 0) {
    // Pega extensão da imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    // Gera um nome único para a imagem
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
    // Caminho de onde ficará a imagem
    $caminho_imagem = "../fotos/" . $nome_imagem;
    // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($foto["tmp_name"], $caminho_imagem);
  }
}

if(empty($foto['name'])) {
    $query = "UPDATE tweets SET texto='$texto', editado = 1 WHERE id = '$id'";
} else {
    $query = "UPDATE tweets SET texto='$texto', foto = '$caminho_imagem', editado = 1 WHERE id = '$id'";
}
$result = $conn->query($query);

if (!$result){
  echo json_encode('{"erro": "Ops, ocorreu um erro! Reinicie a pagina e tente novamente."}');
} else {
  echo json_encode("{'sucesso': 'Tweet Alterado!'}");
}
$conn->close();
?>
