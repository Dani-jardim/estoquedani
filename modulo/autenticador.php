<?php
	session_start();

	require_once 'conexao.php';

	$consulta = $conn->query("SELECT count(*) as qtd, codigo FROM dreamteam.tblogin where email='".$_POST['txtemail']."' and senha='".$_POST['txtsenha']."';");
	$linha = $consulta->fetch(PDO::FETCH_ASSOC);
	var_dump($consulta);
	if($linha['qtd']==1){
		$_SESSION['codigo'] = $linha['codigo'];
		header('location: ../admProduto.php'); 
	}else{
		echo("<script> alert('Login não encontrado, tente novamente.'); location.href='../index.php';</script>");
	}
?>
