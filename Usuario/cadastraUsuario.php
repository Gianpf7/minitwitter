<?php
require_once("../conecta.php");
require_once("../utils.php");

$nome = fromPost("nome");
$usuario = fromPost("usuario");
$email = fromPost("email");
$senha = md5(fromPost("senha"));
$foto = $_FILES['foto'];

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
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}/i", $foto["name"], $ext);
    // Gera um nome único para a imagem
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
    // Caminho de onde ficará a imagem
    $caminho_imagem = "../fotos/" . $nome_imagem;
    // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($foto["tmp_name"], $caminho_imagem);
  }
}

$query = "INSERT INTO usuarios(nome, usuario, senha, email, foto) VALUES ('$nome','$usuario','$senha','$email','$caminho_imagem');";

$result = $conn->query($query);

if (!$result){
  $retorno['error'] = "Ops, ocorreu um erro! Reinicie a pagina e tente novamente.";
  echo json_encode($retorno);
} else {
  $retorno['sucesso'] = "Usuário cadastrado com sucesso!";
  $retorno['usuario'] = $usuario;
  echo json_encode($retorno);
}
$conn->close();
?>
