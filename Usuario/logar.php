<?php
require_once("../conecta.php");
require_once("../utils.php");

	$usuario = fromPost["usuario"];
	$senha = md5(fromPost["senha"]);
	$lembrar = isset(fromPost["lembrar"]);
	$_COOKIE['lembrar'] = $usuario;
	$query = "SELECT id, nome, email, foto FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
	$result = $conn->query($query);
	if (!$result) die($conn->error);
	$rows = $result->num_rows;
	if ($rows == 0){
		$retorno['error'] = "Usuario ou senha incorretos.";
		echo json_encode($retorno);
	} else {
		$usuario = $result->fetch_array(MYSQLI_ASSOC);
		if(!isset($_SESSION)) {
			session_start();
		}
		$_SESSION['id'] = $usuario['id'];
		$_SESSION['nome'] = $usuario['nome'];
		$_SESSION['email'] = $usuario['email'];
		$_SESSION['foto'] = $usuario['foto'];
		echo json_encode($usuario);
	}
	$result->close();
	$conn->close();

?>
